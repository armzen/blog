<?php

namespace app\modules\admin\controllers;
use app\controllers\AppController;
use yii\web\Controller;

use app\models\Topnews;
use app\models\Images;

use app\modules\admin\models\Myusers;
use Yii;
use yii\web\UploadedFile;
use app\modules\admin\models\ImageUpload;

class DefaultController extends Controller
{
    
    public $layout = 'admin-layout';
    
    public function actionIndex()
        {
            $array = Topnews::getAlldata();
            return $this->render('index', ['array' => $array]);
        }
    
    public function actionCreate()  // create record
        {
                $create = new Topnews();

                /* ignored in call, but run if $_POST[Topnews] not empty */
                if($create->load(\Yii::$app->request->post()) && $create->validate()) {
                    if($create->save()){
                        return $this->redirect(['default/index']);
                    }
                }
                /* pass only the model Topnews as a Form model */
                return $this->render('create',['create' => $create]);
        }
    
    public function actionUpdate($id)   // change
        {
            $one = Topnews::getOnedata($id);
            /* ignored in call, but run if $_POST[Topnews] not empty */
            if($one->load(\Yii::$app->request->post()) && $one->validate()) {
                //$one->attributes = $_POST['MyList'];
                if($one->save()) {
                    return $this->redirect(['default/index']);
                }                
            }      
            return $this->render('update', ['one' =>$one]);
        }
        
    public function actionDelete($id)   // drop row
        {
            $delete = Topnews::getOnedata($id);
            if($delete !== Null) {
                $delete->delete();
                return $this->redirect(['default/index']);
            }
        }
        //----------------------------------//
        /* Admin's Functions for users CRUD */
        
        public function actionMyusers()  // read, user's list
        {
            $myusers = Myusers::getUsers();
            return $this->render('userslist', ['myusers' => $myusers]);
        }
        
        
        public function actionCreateUser()  // create user
            {
                $create = new Myusers();
                if($create->load(\Yii::$app->request->post()) && $create->validate()) {
                    $create->setPass($create->pass);
                    if($create->save()){
                        return $this->redirect(['default/myusers']);
                    }
                }
                return $this->render('create-user',['create' => $create]);
            }
        
        public function actionUpdateUser($id)   // change user's data
            {
                $one = Myusers::getOneUser($id);                
                if($one->load(\Yii::$app->request->post()) && $one->validate()) {
                    //$one->attributes = $_POST['Myusers'];
                    if($one->save()) {
                        return $this->redirect(['default/myusers']);
                    }                
                }  
                return $this->render('update-user', ['one' =>$one]);
            }
        
        public function actionDeleteUser($id)   // drop user from DB
        {
            $delete = Myusers::getOneUser($id);
            if($delete !== Null) {
                $delete->delete();
                return $this->redirect(['default/myusers']);
            }
        }
        
        //----------------------------------//
          /* Admin's Functions for images CRUD */
        
        public function actionImageUpload()     // upload and read images list
            {   
                $imgList = Images::getAllImages();
                $imgUp = new ImageUpload();
                 if (Yii::$app->request->isPost) {
                    $imgUp->imageFile = UploadedFile::getInstance($imgUp, 'imageFile');
                    if ($imgUp->upload()) {
                        Yii::$app->session->setFlash('hajoxak', 'lava, ekav nkary');                   
                    }
                }
                return $this->render('imagination',['imgUp' => $imgUp, 'imgList' => $imgList]);
            }
        
        public function actionCreateImage()    // create record, add image into DB
            {
                $newImage = new Images();
                if($newImage->load(Yii::$app->request->post()) && $newImage->validate()) {
                    if($newImage->save()) {
                        return $this->redirect(['default/image-upload']);
                    }
                }            
                return $this->render('create-image', ['newImage' => $newImage]);            
            }
        
        public function actionUpdateImage($id)   // change images
            {
                $one = Images::getOneImage($id);           
                if($one->load(\Yii::$app->request->post()) && $one->validate()) {
                    if($one->save()) {
                        return $this->redirect(['default/image-upload']);
                    }                
                }           
                return $this->render('update-image',['one' => $one]);
            }
            
        public function actionDeleteImage($id)   // drop image from DB
            {
                $delete = Images::getOneImage($id);
                if($delete !== Null) {
                    $delete->delete();
                    return $this->redirect(['default/image-upload']);
                }
            }
        
}
