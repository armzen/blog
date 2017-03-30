<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\Images;
use app\models\Lang;
use app\models\Menu;
use app\models\News;
use app\models\About;
use \app\models\Topnews;

use \yii\data\ArrayDataProvider;
use app\components\ParentController;
use app\models\Mixed;



class SiteController extends ParentController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        echo(Yii::$app->controller->id);die;
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        /*
        $cmd = Yii::$app->db->createCommand('SELECT news.*, images.iname FROM {{news}}, {{images}} WHERE lang_id = "arm" AND image_id = images.id');
        $provider = new ArrayDataProvider([
           'allModels' =>$cmd->queryall()
        ]); */
        return $this->render('index'
                //,['dataProvider' => $provider]
        );
        
    }
    
    public function actionTest() {
        return $this->render('Hello from test!');
    }

        public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

	
    public function actionNews() {
            $news = News::find()->where(['id'=>1])->all();		
            return $this->render('news',['news' => $news]);
    }
	
    public function actionAbout() {
        $ab = About::find()->where( ['lang_id'=> 'arm'] )->all();
        return $this->render('about',['about'=>$ab]);
    }
    
    public function actionImages() {
        $images = Images::find()->all();
        return $this->render('images',['images'=>$images]);
    }
    
    public function actionTopnews() {
        $news = Topnews::find()->where(['lang_id'=>'arm'])->all();
        return $this->render('topnews',['news' => $news]);
    }
    
    public function actionMixed() {
        $mix = Mixed::findBySql("SELECT news.*, images.id FROM {{news}}, {{images}} WHERE lang_id = 'arm' AND image_id = images.id")->all();
        return $this->render('mixed',
            ['mix'=>$mix ]
        );
    }

}
/*
 * SELECT news.*, images.iname FROM news, images, lang 
 * WHERE image_id = images.id AND lang_id='arm'
 * 
 * SELECT * FROM news  INNER JOIN images ON"
 * . " news.image_id = images.id AND lang_id='arm'
 * 
 * 
 * SELECT * from news ORDER by id DESC LIMIT 3
 *  */
