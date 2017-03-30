<?php
/**
 * Description of Logblog
 *
 * @author arm
 */
namespace app\models;
use yii\base\Model;
use Yii;


class Logblog extends Model {
    //put your code here
    public $username;
    public $password;
    public $email;
    public $rememberMe = true; // չեքբոքսի հնարավոր արժեքները պահող փոփոխական՝ 1 կամ 0 ( true/false boolean type)
    // ավելացնել view/log.php -ում չեքբոքսը
    public $status;


    public function rules() {
        parent::rules();
        return [
            [['username', 'password'],'required', 'on' => 'default'],
            [['username', 'password', 'email', 'rememberMe'],'trim'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            ['password', 'validPassword'],
            ['username', 'string', 'min' => 5, 'on' => 'test1'],
            
        ];
    }
    
    public function validPassword($attr) {
        if(($this->password) == 123){
            $this->addError($attr, 'your password is not safe');
        }
    }

    public function attributeLabels() {
        parent::attributeLabels();
        return [
            'username' => 'name of user',
            'password' => 'word of passed',
            'rememberMe' => ' don\'t forget me'
        ];
    }
    
    public function log() {
        return TRUE; // success imitation
    }
    
}
