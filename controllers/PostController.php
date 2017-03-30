<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of PostController
 *
 * @author arm
 */
class PostController extends AppController {
    
    public function actionIndex() {
    //  return 'Hello, world!';
        $hello = 'Hello, world';
        $how = 'How beautiful our life';
        return $this->render('hello', ['hello' => $hello, 'how' => $how]); 
    }
    
    public function actionHi($name = 'Guest',$lang = 'en') {
    //  return "Hi Gitler!";
        $hy = 'Hi Jhony';
        $how = 'How are you?';
        $everything = 'We can pass any type of data: number, boolean, string, array and object';
        $uk = 'http://localhost/blog/web/index.php?r=post/hi&name=Gago&lang=uk';
        /*
        if($lang == 'rus'){
            $lang = 'rus-rus';
        }
        */
        $lanar =array ('eng','rus','arm');
        if(in_array($lang, $lanar)){
            return 'exists';
        }
        else
        return $this->render('hi', compact('hy','how', 'everything', 'name', 'lang', 'uk'));
        /* if in array, return "SELECT * FROM `posts` WHERE language is 'requested by user' "
         * else { do what you do default - view in english}    
         * play a little with GETs to undertanding mechanizm     */
    }
}
