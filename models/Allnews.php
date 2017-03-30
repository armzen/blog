<?php

namespace app\models;
use yii\db\ActiveRecord;

class Allnews extends ActiveRecord
{
    public static function tableName() {
        return '{{news}}';
    }
    
    public function getImages(){
        return $this->hasMany(Images::className(), ['id' => 'image_id']);
               
    }
}

?>
