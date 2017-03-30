<?php
namespace app\modules\admin\models;

use yii\base\Model;

class ImageUpload extends Model {
   
    public $imageFile; 
    
    public function rules() {
        parent::rules();
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile
                 ->saveAs('post_images/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
