<?php

namespace app\models;
use yii\db\ActiveRecord;

class ContactAddress extends ActiveRecord {
    
    public static function tableName() {
        parent::tableName();
        return '{{contact_translate}}';
    }
    
    public static function getAddressContent($lang_id) {
        $data = self::find()
                ->where(['lang_id' => $lang_id])
                ->asArray()
                ->all();
        
        return $data;
    }
}


