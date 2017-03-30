<?php

namespace app\models;
use yii\db\ActiveRecord;

class Topnews extends ActiveRecord
{
    public static function tableName() {
        return '{{news}}';
    }
    
    /* 'get' - prefix is required */
    public function getImages(){
        return $this->hasMany(Images::className(), ['id' => 'image_id']);
               
    }
    
    public static function getTopLast3($lang_id) {
        $data = self::find()
                ->where(['lang_id' => $lang_id])
                ->with('images')
                ->asArray()
                ->orderBy(['id' => SORT_DESC])
                ->limit(3)
                ->all();
        
        return $data;
    }
    
    public static function getAllnews($lang_id) {
        
        $data = self::find()
                    ->where(['lang_id' => $lang_id])
                    ->with('images')
                    ->asArray()
                    ->orderBy(['id' => \SORT_DESC])
                    //->all()
                ;
        
        return $data;
    }
    
    
     /* admin's calling */
     public function rules() {
        parent::rules();
        return [
            [['header', 'image_id', 'date', 'released', 'intro_text', 'full_text', 'lang_id'], 'required'],
            ['full_text', 'CleanUp'],
            ['intro_text', 'CleanUp'],
        ];
    }
    public function CleanUp($var) {
        $var = htmlspecialchars($var);
        $var = strip_tags($var);
        $var = stripslashes($var);
        $var = trim($var);
        return $var;
    }
    
    public static function getAlldata() {        
        $data = self::find()                    
                    ->with('images')
                    ->asArray()
                    ->orderBy(['id' => \SORT_DESC])
                    ->all();
        
        return $data;
    }
    
    public static function getOnedata($id) {        
        $data = self::find()                    
                    ->with('images')
                    ->where(['id' => $id])
                    ->orderBy(['id' => \SORT_DESC])
                    ->one();        
        return $data;
    }

}

?>

