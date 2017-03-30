<?php

namespace app\models;
use yii\db\ActiveRecord;

class Images extends ActiveRecord
{

    public function afterFind() {
        //$this->iname = "web/post_images/".$this->iname;
    }
    
    public function rules() {
        parent::rules();
        return [
            [['iname', 'id'], 'trim'],
            ['iname', 'required'],
        ];
    }

    public static function getAllImages(){
        $data = self::find()
                ->asArray()
                ->orderBy(['id' => SORT_DESC])
                ->all();
        return $data;
    }
    
    public static function getOneImage($id){
        $data = self::find()
                ->where(['id' =>$id])
                ->one();
        return $data;
    }
}

