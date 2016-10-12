<?php

// Format class

class Format {
    public function formatDate($date){
      return date('F j, Y, g:i a', strtotime($date)); 
    }
    public function textShorten($text, $limit =400){
        $text = $text." ";
        $text = substr($text, 0,$limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text.".....";
        return $text;
    }
    public function validation($data){
        $trim = trim($data);
        $strip = stripcslashes($trim);
        $htmlspe = htmlspecialchars($strip);
        return $htmlspe;
    }
    public function title(){
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        /*$title = str_replace('_', ' ', $title); for like as contact_us */
        if($title == 'index'){
            $title = 'home';
        }elseif($title == 'contact'){
             $title = 'contact';
        }
        return  $title = ucfirst($title);
    }
}
