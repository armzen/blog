<?php

namespace app\models;
use yii\db\ActiveRecord;

class ContactFormLabels extends ActiveRecord{
    
    public static function tableName() {
        parent::tableName();
        return '{{form_translate}}' ;
    }
    
    public static function getFormLabels($lang_id) {        
        $data = self::find()
                ->where(['lang_id' => $lang_id])
                ->asArray()
                ->one();        
        return $data;
    }
}
