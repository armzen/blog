<?php

namespace app\modules\admin\models;
use \yii\db\ActiveRecord;
use Yii;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $pass
 * @property string $email
 */
class Myusers extends ActiveRecord
{
    public static function tableName() {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name', 'pass', 'email'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['pass'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 120],
        ];
    }
    public function setPass($password) {
        $this->pass = md5($password);
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
    
    public static function getUsers() {
        $data = self::find()
                ->asArray()
                ->all();        
        return $data;
    }
    
    public static function getOneUser($id) {
        $data = self::find()
                ->where(['id' => $id])
                ->one();        
        return $data;
    }
}
