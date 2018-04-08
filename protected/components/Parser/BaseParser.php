<?php
/**
 * Description of BaseParser
 *
 * @author Jeka
 */
class BaseParser {
    
    public static function getStringContent($link) {
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $link);
            curl_setopt ($ch, CURLOPT_POST, 1);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec ($ch);
            curl_close($ch);
            return $result;
    }
    
    public static function olo2($link){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result['contents']=curl_exec($ch);
        $result['info']=curl_getinfo($ch);
        curl_close($ch);
        return $result['contents'];
    }

    public static function isBannedLeague($alias,$betProvider){
        $model = BannedLeague::model()->find('alias = :alias AND bets_provider_id = :bpid',
                array(':alias'=>$alias,':bpid'=>$betProvider));
        if (!empty($model)){
            return true;
        } else {
            return false;
        }
    }
    
    public static function createReport($bet_provider_id,$leagues,$events,$count_updated,$count_created){
       $model = ParseReport::model()->find('bet_provider_id = :bpid',array(':bpid'=>$bet_provider_id));
       if (empty($model)){
         $model = new ParseReport();
       }
       $model->bet_provider_id = $bet_provider_id;
       $model->count_created = $count_created;
       $model->count_updated = $count_updated;
       $model->date = date("Y-m-d H:i:s");
       $model->body = '<table>';
       foreach ($leagues as $league){
           $model->body = $model->body.'<tr><td>'.$league.'</tr></td>';
       }
       $model->body = $model->body.'</table>';
      $model->body = $model->body.'<table>';
      foreach ($events as $event){
           $model->body = $model->body.'<tr><td>'.$event.'</tr></td>';
       }
      $model->body = $model->body.'</table>';
      $model->save(); 
      return;
    }
    
    public static function post_content($url,$postdata) {
  $uagent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)";

    $ch = curl_init( $url );
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_ENCODING, "");
    curl_setopt($ch, CURLOPT_USERAGENT, $uagent);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "c://coo.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE,"c://coo.txt");
    curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Accept' => '*/*',
                                                'Accept-Encoding' => 'gzip, deflate',
                                                'Accept-Language' => '*',
                                                'Cookie' => '_ga=GA1.2.1819750086.1465393115; _dc_gtm_UA-821699-9=1',
                                                'Host' => 'd.myscore1.ru',
                                                'Referer' => 'http://d.myscore1.ru/x/feed/proxy',
                                                'User-Agent' => 'core',
                                                'X-Fsign'=>'SW9D1eZo',
                                                'X-Requested-With'=>'XMLHttpRequest',));
    

    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    return $content;//$header;
}
    
}
