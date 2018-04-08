<?php
/**
 * Description of ParimatchParser
 *
 * @author Jeka
 */

class LeonbetsParser {
    
    const BASE_URL = 'https://ru.leonbets.net/betoffer';
    public $unknown_leagues = array();
    public $unknown_events = array();
    public $count_new_line = 0;
    public $count_update_line = 0;   
    
    // Шаблоны
    public static function patternList($key){
    $list = array('MAIN_PATTERN' => 
                    '/<tr[\s]*class=\"row[1-2]{1}\">.+'.
                    '<script>printShortDate\(([0-9]{5,20})\)<\/script>.+'.
                    '<strong>[\s]*<a.+>[\s]*(.+)[\s]-[\s](.+)<\/a>[\s]*<\/strong>[\s]*<\/td>[\s]*'.
                    '<td.+class=\"oddj\">[\s]*<a.+><strong>([0-9]{1,3}\.[0-9]{1,3})<\/strong><\/a>[\s]*<br><span.+<\/span><\/td>[\s]*'.
                    '<td.*((?:[0-9]{1,3}\.[0-9]{1,3})|(?:-)).*<\/td>[\s]*'.
                    '<td.+class=\"oddj\">[\s]*<a.+><strong>([0-9]{1,3}\.[0-9]{1,3})<\/strong><\/a>[\s]*<br><span.+<\/span><\/td>[\s]*'.
                    '<td.+show\(\"ev([0-9]{1,30})\"\).+<\/a>[\s]*<\/td>[\s]*<\/tr>'.
                    '/Us',

                  'LEAGUE_TITLE' =>
                    '/<div[\s]*class=\'head-title\'>[\s]*<div[\s]*class=\'middle\'>'.
                    '[\s]*<h1>[\s]*([\s\S]{1,200})[\s]*<\/h1>[\s]*<\/div>[\s]*<\/div>/',

                  'TARGET_LINK' => '/<a.*href=\"(.+\/betoffer\/.+)\">.+<\/a>/U',

                  'OTHER_LINES' => 
                    '/<tr[\s]*id=\"ev{{out_id}}'.
                    '\".+<\/span>[\s]*<\/td>[\s]*<\/tr>[\s]*<\/table>[\s]*<\/td>[\s]*<\/tr>/Us',
                
                  'DOUBLE_EXIT' => 
                    '/<table.+class=\"morebets\">[\s]*'. 
                    '<tr>[\s]*<td[^>]*>[\s]*<strong>[\s]*(Двойной[\s]*исход)[\s]*<\/strong>[\s]*<\/td>[\s]*<\/tr>[\s]*'.
                    '<tr.+<strong>([0-9]{1,3}\.[0-9]{1,3})[\s]*<\/strong>.+<\/tr>[\s]*'.
                    '<tr.+<strong>([0-9]{1,3}\.[0-9]{1,3})[\s]*<\/strong>.+<\/tr>[\s]*'.
                    '<tr.+<strong>([0-9]{1,3}\.[0-9]{1,3})[\s]*<\/strong>.+<\/tr>'.
                    '/Us',
        
                  'OVER_UNDER' =>
                    '/<table.+class=\"morebets\">[\s]*'. 
                    '<tr>[\s]*<td[^>]*>[\s]*<strong>[\s]*Б\/М[\s]*([0-9]{1,3}\.[0-9]{1,3})[\s]*гола[\s]*<\/strong>[\s]*<\/td>[\s]*<\/tr>[\s]*'.
                    '<tr.+<strong>([0-9]{1,3}\.[0-9]{1,3})[\s]*<\/strong>.+<\/tr>[\s]*'.        
                    '<tr.+<strong>([0-9]{1,3}\.[0-9]{1,3})[\s]*<\/strong>.+<\/tr>'.
                    '/Us',
                   'OVER_UNDER_TENNIS' =>
                    '/<table.+class=\"morebets\">[\s]*'. 
                    '<tr>[\s]*<td[^>]*>[\s]*<strong>[\s]*Тотал[\s\S^(^)]+'.
                    '<tr.+<strong>'.//[\s]*Больше[\s]*([0-9]{1,3}\.[0-9]{1,3})[\s]*<\/strong>.+<\/tr>[\s]*'.        
                   // '<tr.+<strong>([0-9]{1,3}\.[0-9]{1,3})[\s]*<\/strong>.+<\/tr>'.
                    '/Us',
                  
                  'SPREAD' => 
                    array(0 => '/(Азиатский[\s]*гандикап)[\s]*<\/strong>(.+)<\/table>/Us',
                          1 => '/<tr.+1[\s]*\([\s]*([+-]{1}[\s]*[0-9.]{1,15})[\s]*\)'.
                               '[\s]*<\/td>.+<strong>[\s]*([0-9.]{1,15})[\s]*<\/strong>'.
                               '.+2[\s]*\([\s]*([+-]{1}[\s]*[0-9.]{1,15})[\s]*\)'.
                               '.+<strong>[\s]*([0-9.]{1,15})[\s]*<\/strong>.+<\/tr>/Us'
                        ),
        );
      return $list[$key];
    }

    
    public function ParseAll(){
       // берем одну из страниц чтоб собрать с нее список ссылок        
       /*$data = BaseParser::getStringContent(self::BASE_URL);
        $pattern = self::patternList('TARGET_LINK');
        // выбираем по шаблону нужнные линки
        preg_match_all($pattern,$data,$matches);
        if(empty($matches[1])){
            throw new Exception('Не распарсилась базовая страница');
        }       
        // перебираем их и парсим данные           
        foreach ($matches[1] as $link){
            $this->ParseLine($link);
        }  */      
        //$this->ParseLine('https://ru.leonbets.net/betoffer/1/9359683');
        // записываем отчет по парсингу этого сайта в базу    
         $this->ParseLine('https://ru.leonbets.mn/betoffer/10000005/49463');
        BaseParser::createReport(
                    BetsProvider::LEONBETS, 
                    $this->unknown_leagues,
                    $this->unknown_events,
                    $this->count_update_line, 
                    $this->count_new_line);
    }
    
    public function ParseLine($link){       
        // берем данные со страницы
        $data = BaseParser::getStringContent($link);
        // смотрим название лиги        
        preg_match(self::patternList('LEAGUE_TITLE'),$data, $matches);
        if (empty($matches)){
           throw new Exception('Не распарсилось название лиги');
          return;
        }
        // если лига забанена руками не продолжаем...
        if (BaseParser::isBannedLeague($matches[1],BetsProvider::LEONBETS)){
            return;
        }        
        // ищем среди алисов такую лигу
        $aliasLeague = AliasLeague::model()->find('alias = :alias',array(':alias'=>trim($matches[1])));
        if (empty($aliasLeague)){
            $this->unknown_leagues[] = CHtml::openTag('span',array('style'=>'color:red;')).
                                         trim($matches[1]).
                                       CHtml::closeTag('span');
            return;
        }
        // распарсиваем всю линию на множество повторяющихся фрагментов
        $pattern = self::patternList('MAIN_PATTERN');
        preg_match_all($pattern,$data,$matches);
        // и начинаем записывать в БД накопаные линии
        $transaction = Yii::app()->db->beginTransaction();
        try {
                foreach ($matches[0] as $k=>$v){
                    $aliasTeam1 = AliasTeam::model()->find('alias = :alias',array(':alias'=>trim($matches[2][$k])));
                    $aliasTeam2 = AliasTeam::model()->find('alias = :alias',array(':alias'=>trim($matches[3][$k])));
                    if (!empty($aliasTeam1) && !empty($aliasTeam2)){
                        $event = Event::model()->find('team_home = :th AND team_away = :ta AND league_id = :lid AND date = :date',
                                array(':th'=>$aliasTeam1->team_id,
                                      ':ta'=>$aliasTeam2->team_id,
                                      ':lid'=>$aliasLeague->league_id,
                                      ':date'=>date("Y-m-d H:i:s",trim($matches[1][$k])/1000),
                                    ));
                        if (empty($event)){                      
                            $event = new Event();
                            $event->team_home = $aliasTeam1->team_id;
                            $event->team_away = $aliasTeam2->team_id;
                            $event->date = date("Y-m-d H:i:s",trim($matches[1][$k])/1000);
                            $event->created = date("Y-m-d H:i:s");                            
                            $event->league_id = $aliasLeague->league_id;
                            $event->save();
                        }
                        $line = Line::model()->find('event_id = :eid AND bet_type_id = :btid',
                                array(
                                    ':eid' => $event->id,
                                    ':btid' => (trim($matches[5][$k]) == '-')?BetType::MONEYLINE_12:BetType::MONEYLINE_1X2,
                                ));
                        if (empty($line)){
                            $line = new Line();
                            $line->team_home = trim($matches[4][$k]);
                            $line->draw = (trim($matches[5][$k]) == '-')?null:trim($matches[5][$k]);
                            $line->team_away = trim($matches[6][$k]);
                            $line->event_id = $event->id;
                            $line->bet_type_id = (trim($matches[5][$k]) == '-')?BetType::MONEYLINE_12:BetType::MONEYLINE_1X2;
                            $line->created = date("Y-m-d H:i:s");
                            $line->updated = date("Y-m-d H:i:s");
                            $this->count_new_line++;
                        } else {
                            $line->team_home = trim($matches[4][$k]);
                            $line->draw = (trim($matches[5][$k]) == '-')?null:trim($matches[5][$k]);
                            $line->team_away = trim($matches[6][$k]);                          
                            $line->updated = date("Y-m-d H:i:s");
                            $this->count_update_line++;
                        }
                        $line->save();
                        $this->parseOtherLines($matches[7][$k],$data,$event);                        
                    } else {
                        $this->unknown_events[] = ((!empty($aliasTeam1))?CHtml::link($aliasTeam1->team->name,Yii::app()->createUrl('team/update',array('id'=>$aliasTeam1->team_id))):CHtml::openTag('span',array('style'=>'color:orchid')).trim($matches[2][$k]).CHtml::closeTag('span'))
                                                    .' - '.
                                                  ((!empty($aliasTeam2))?CHtml::link($aliasTeam2->team->name,Yii::app()->createUrl('team/update',array('id'=>$aliasTeam2->team_id))):CHtml::openTag('span',array('style'=>'color:orchid')).trim($matches[3][$k]).CHtml::closeTag('span'))
                                                  .' ('.CHtml::link($aliasLeague->league->name,Yii::app()->createUrl('league/update',array('id'=>$aliasLeague->league_id))).')';  
                    }                  
                }
                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollback();
            }            
    } 
    
    public function parseOtherLines($out_id,$data,$event){
        $pattern = str_replace('{{out_id}}',$out_id,self::patternList('OTHER_LINES'));
        preg_match($pattern,$data,$matches);
        if (empty($matches)){
          return;
        }
        $this->parseDoubleExit($matches[0],$event);
        $this->parseOverUnder($matches[0],$event);
        $this->parseSpread($matches[0],$event);
    }
    
    // ставка двойной исход
    public function parseDoubleExit($data,$event){
        $pattern = self::patternList('DOUBLE_EXIT'); 
        preg_match($pattern,$data,$matches);
        if (empty($matches)){
            return;
        }
        $line = Line::model()->find('event_id = :eid AND bet_type_id = :btid',
                array(
                    ':eid' => $event->id,
                    ':btid' => BetType::DOUBLE_EXIT,
                ));
        if (empty($line)){
            $line = new Line();
            $line->event_id = $event->id;
            $line->bet_type_id = BetType::DOUBLE_EXIT;
            $line->created = date("Y-m-d H:i:s");
            $line->updated = date("Y-m-d H:i:s");
            $this->count_new_line++;
        } else {                         
            $line->updated = date("Y-m-d H:i:s");
            $this->count_update_line++;
        }
        $line->team_home = trim($matches[2]);
        $line->draw = trim($matches[3]);
        $line->team_away = trim($matches[4]);
        $line->save();
    }
    // ставка больше меньше
    public function parseOverUnder($data,$event){
        $pattern = self::patternList('OVER_UNDER'); 
        preg_match_all($pattern,$data,$matches);
        if (empty($matches[0])){
           $pattern = self::patternList('OVER_UNDER_TENNIS'); 
            preg_match_all($pattern,$data,$matches);
        }        
        if (empty($matches[0])){
            return;
        }        
        foreach ($matches[0] as $k=>$v){
            $line = Line::model()->find('event_id = :eid AND bet_type_id = :btid AND count_points = :cp',
                    array(
                        ':eid' => $event->id,
                        ':btid' => BetType::OVER_UNDER,
                        ':cp' => trim($matches[1][$k]),
                    ));
            if (empty($line)){
                $line = new Line();
                $line->event_id = $event->id;
                $line->bet_type_id = BetType::OVER_UNDER;
                $line->created = date("Y-m-d H:i:s");
                $line->updated = date("Y-m-d H:i:s");
                $line->count_points = trim($matches[1][$k]);
                $this->count_new_line++;
            } else {                         
                $line->updated = date("Y-m-d H:i:s");
                $this->count_update_line++;
            }
            $line->team_home = trim($matches[2][$k]);            
            $line->team_away = trim($matches[3][$k]);            
            $line->save();
        }
    }
    // ставка спрэд, он же фора, он же азиатский гандикап
    public function parseSpread($data,$event){
        $pattern = self::patternList('SPREAD')[0];
        preg_match($pattern,$data,$matches);
        if (empty($matches)){        
          return;
        }
        $subPattern = self::patternList('SPREAD')[1];
        preg_match_all($subPattern,$matches[0],$matches);
        if (empty($matches)){        
          return;
        }
        foreach ($matches[0] as $k=>$v){
            $line = Line::model()->find('event_id = :eid AND bet_type_id = :btid AND count_points = :cp',
                    array(
                        ':eid' => $event->id,
                        ':btid' => BetType::SPREAD,
                        ':cp' => trim($matches[1][$k]),
                    ));
            if (empty($line)){
                $line = new Line();
                $line->event_id = $event->id;
                $line->bet_type_id = BetType::SPREAD;
                $line->created = date("Y-m-d H:i:s");
                $line->updated = date("Y-m-d H:i:s");
                $line->count_points = trim($matches[1][$k]);
                $this->count_new_line++;
            } else {                         
                $line->updated = date("Y-m-d H:i:s");
                $this->count_update_line++;
            }
            $line->team_home = trim($matches[2][$k]);            
            $line->team_away = trim($matches[4][$k]);            
            $line->save();
        }
    }    
}
