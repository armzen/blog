<?php

namespace app\models;
use yii\base\Model;


//Данный класс расширяет класс yii\base\Model, 
class Basicform extends Model {
    
    public $name;
    public $email;
    
    public function rules() {
        return[
           [['name', 'email'], 'required'],
            ['email', 'email'],            
        ];
    }
}

/*класс модели Bform будет использоваться для хранения данных, введённых пользователем.*/
/* name u mail partadir, mail-@ email tipi e */