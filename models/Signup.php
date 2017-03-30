<?php
// Модель прослойка, нет связи с базой данных
// Ислючительно для фильтрации и валидации данных
// => не имеем никакой связи с полями таблицы базы
// Для получения формы добаляем обьект модели в вид в контроллере

namespace app\models;
use yii;
use yii\base\Model;

class Signup extends Model {
    
    public $name;
    public $email;
    public $password;
    
    public function rules() {
        parent::rules();
        return ([
            [['name', 'email', 'password'], 'required'] ,
            ['name', 'string', 'length' => [2,100]],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::className()],
            ['name', 'unique', 'targetClass' => 'app\models\User'],
            ['password','string',  'min' => 2, 'max' => 255],
        ]);        
    }

    // для проверки имеется юзер в базе
    // user / user@user.ru / userpass
    public function signup() {
        $user = new User();
        $user->email = $this->email;
        $user->name = $this->name;
        $user->setPass($this->password);
        return $user->save()? $user: NULL;
    }

}
