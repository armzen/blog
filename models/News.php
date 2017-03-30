<?php

namespace app\models;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
     public static function tableName() {
        return '{{news}}';
    }

    public function getImages(){
        return $this->hasMany(Images::className(), ['id' => 'image_id']);
               
    }
    
    public static function getNewsById($lang_id, $get_id) {
        
        $data = self::find()
                    ->where(['lang_id' => $lang_id])
                    ->andWhere(['id' => $get_id])
                    ->with('images')                
                    ->asArray()
                    ->orderBy(['id' => \SORT_DESC])
                    ->all();
        
        return $data;
    }
    
    public static function getBtnTranslate($lang_id) {
        switch ($lang_id){
            case 1:
            $btn_main = 'Գլխավոր Նորութոյւններ';
            $btn_all_news ='Բոլոր Նորությունները';
            break;
            case 2:
                $btn_main = 'Top News';
                $btn_all_news ='All News';
                break;
            case 3:
                $btn_main = 'Главные новости';
                $btn_all_news ='Все новости';
                break;
            default :
                $btn_main = 'Գլխավոր Նորութոյւններ';
                $btn_all_news ='Բոլոր Նորությունները';
        }
        
        $twoBtns = ['btn_main' => $btn_main, 'btn_all_news' => $btn_all_news];
        return $twoBtns;
    }
}

