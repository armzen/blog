<?php

namespace app\models;

use yii\db\ActiveRecord;

class About extends ActiveRecord
{
    public static function getAbout($lang_id) {
        
        $data = self::find()
                ->where(['lang_id' => $lang_id])
                ->asArray()
                ->all();
        return $data;
    }

//   https://www.youtube.com/watch?v=roWgdFOhBnQ    
    
}



