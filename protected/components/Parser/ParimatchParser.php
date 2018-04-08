<?php
/**
 * Description of ParimatchParser
 *
 * @author Jeka
 */
require_once Yii::app()->basePath.'/components/simple_html_dom.php';

class ParimatchParser {
    
    const BASE_URL = 'http://www.parimatch.com';
    
    public static function ParseAll(){
        //берем дерево узлов в виде obj
        $data = file_get_html(self::BASE_URL);
        //выбираем все ссылки и отсеиваем из них ненужные, оставляем только ссылки на линии
        $links = array();
        foreach($data->find('a') as $element){
           if (preg_match('/^\/sport\/[\S\s]{1,1000}$/',$element->href) &&
              !preg_match('/^\/sport\/futbol\-itogi[\S\s]{1,1000}$/',$element->href) &&
              !preg_match('/^\/sport\/razvlechenija[\S\s]{1,1000}$/',$element->href) &&
              !preg_match('/^\/sport\/politika[\S\s]{1,1000}$/',$element->href) &&
              !preg_match('/^\/sport\/lotereja[\S\s]{1,1000}$/',$element->href)){
              $links[] = $element->href;
              echo $element->href.'<br>';
           }
        }
        return $links;
    }
    
    public static function ParseLine($link){
        $data = file_get_contents($link);
        preg_match('/(<table[\S\s]{1,200}class=\"dt[\s]{1,10}twp\"[\S\s]*<\/table>)[\S\s]*<table[\s]{1,10}class=buttons>/s',$data, $matches);
        echo $matches[1];
        //$data = str_get_html($matches[1]);
        die();
      //  $data = str_get_html($data);        
      //print_r($data);
        return;
    }
}
