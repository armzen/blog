<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;

class Menuwidget extends Widget {
    
    public $name;
    public function init() {
        
        parent::init();
        if($this->name === NULL) return $this->name = 'Guest';
        else {return $this->name ;}
    }

    public function run() {
        return 'Hello From Widget!';
        //parent::run();
    }
}
