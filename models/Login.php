<?php

namespace app\models;
use yii\base\Model;

class Login extends Model {
    
    public $email;
    public $password;
    
    public function rules() {
        
        return([
            [['email', 'password'],'required'],
            ['email','email'],
            [['password', 'email'], 'trim' ],
            ['password', 'passValidator'] // վալիդության ստուգման սեփական ֆունկցիան:
        ]);
    }

    public function passValidator($attribute) {     
        if(!$this->hasErrors()) // եթե վալիդության հետ կապված խնդիր չունենք, touch to DB
        {
            $user = $this->getUser();
            if(!$user) {
                $addError = $this->addError($attribute, 'Your password or email does\'t correct.');
                return $addError; // եթե նմամը չկա բազայում, ավելացնում և տպում ենք նոր սխալը:
            }
        }        
    }
    
    public function getUser() {        
        $password = \md5($this->password);
        return User::findOne(['pass' => $password, 'email' => $this->email]);
    }
}

/* // $user = User::findOne(['email' => $this->email]);
 * ($user->password != $this->Yii::$app->security->generatePasswordHash($password))
 * !!! Գեներատորը միշտ գեներացնում է նորը, իսկ դա բացառում է վալիդության երբևէ ճիշտ լինելը
 * sha1, md5 - լավագույն ընտրությունը այս դեպքում, կարող ենք User -ում օգտագործել salt1 և salt2
 * 
 *  */