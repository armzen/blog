<?php

namespace app\controllers;
use \yii\web\Controller;


class AppController extends Controller {
    
    //public $layout = 'basic';
    //public $defaultRoute = 'basic/basics';
    
   
}
 function macro($arr) {     
        echo '<pre>';
            print_r($arr);
        echo '</pre>';        
    }
    
   function micro($arr) {     
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
    }
    

    
    
function cleaner($var) {
    $str = htmlspecialchars(strip_tags(stripslashes(trim($var))));    
    return $str;
}