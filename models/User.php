<?php
namespace app\models;
use Yii;
use \yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * User используется для добавления полученных из Signup профиьлтрированных и валидированных
 *  данных пользователей в базу данных.
 *
 * @property integer $id
 * @property string $name
 * @property string $pass
 * @property integer $email
 */
class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'user';
    }
    /*
    public function rules()
    {
        return [
            [['name', 'pass', 'email'], 'required'],
            [['email'], 'trim'],
            [['name'], 'string', 'max' => 100],
            [['pass'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pass' => 'Pass',
            'email' => 'Email',
        ];
    }
    */
    
  
    public function setPass($password) {
        $this->pass = md5($password);
    }
      /* identityInterface-ի սկզբից դատարկ մեթոդները (5 items) , IDE-ն գրանցեց իմ փոխարեն*/
      /* սրանք user - կոմպոնենտի պարտադիր պայմաններն են՝ User մոդելը ընդունելու համար (For Login) */
      /* պարտադիր են գրանցման համար, բայց ոչ օգտագործման */
      /* 1. findIdentity($id) 2. getId() - լրիվ հերիք կլինեն մեզ: */
    //1. find user in DB by  ID
    //2. return userss ID ...
    // http://stuff.cebe.cc/yii2docs-ru/guide-security-authentication.html#navigation-863
    
    public static function findIdentity($id) {
        //1. login-ում կիրառել ենք նմանատիպ մի սեփական ֆ-ա, getUser()
        return self::findOne($id);
    }
    
    public function getId() {
        //2.
        return $this->id;
    }
    
    //------ չենք օգտագործելու -----------//
    public function getAuthKey() {
        // return $this->auth_key;
    } 

    public function validateAuthKey($authKey) {
        // return $this->getAuthKey() === $authKey;
    } 

    public static function findIdentityByAccessToken($token, $type = null) {
        // return static::findOne(['access_token' => $token]);
    }
    // --------------------------------- //

}
