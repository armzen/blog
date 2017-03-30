<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\web\Controller;
use yii;
/**
 * Description of ParentController
 *
 * @author arm
 */
class ParentController extends \yii\web\Controller{
    //put your code here
    
    public function beforeAction($action){
        //echo(\Yii::$app->controller->id);die;
        parent::beforeAction($action);
    }
}
