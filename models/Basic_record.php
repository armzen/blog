<?php

namespace app\models;
use yii\db\ActiveRecord;

class Basic_record extends ActiveRecord
{
    public static function tableName() {
        return '{{menu}}';
    }
    
}


?>

