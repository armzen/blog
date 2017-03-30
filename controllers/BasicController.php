<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Basicform;
use app\models\Basic_record;

use app\models\BasicLog;
use app\models\BasicReg;

use app\models\Topnews;

class BasicController extends AppController {
   
    public $layout = 'basic';
    //public $defaultRoute = 'basic/index';
    public $defaultAction = 'index'; //search

    // Hello!
    public function actionIndex($var1 = 'value 1') {
        $var2 = 'value 2';
        return $this->render('basics', compact('var1', 'var2') );
        /* var1-ը հասանելի է գետից, var2-ը ոչ: */
        /*actionIndex-ը մոդել չունի */
    }
    
    //Form. Model, ActiveForm
    public function actionBasicform() {
        
        $model = new Basicform();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
            return $this->render('basicFormView',['model'=>$model]);
        }
        else{
            return $this->render('basicFormView',['model'=>$model]);
        }
    }
    
    public function actionBasic_record() {
        $lang_id = Yii::$app->request->get('lang_id');
        //$query = Basic_record::find()->where(['lang_id' => "$lang_id"])->all();
        $query = Basic_record::find()->where(['lang_id'=>$lang_id])->all();
        $table_name = Basic_record::tableName();
        return $this->render('basic_record_view', ['menu' => $query, 'table_name'=>$table_name]);
    }
    
    public function actionSearch() {
        $search = \Yii::$app->request->post('search');
        return $this->render('search',['search' => $search]);
    }
    
    /* registration action*/
    public function actionBasicReg()
        {
        $model = new BasicReg();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('reg', [
            'model' => $model,
        ]);
    }
    
    /* authentictioin form */
    public function actionBasicLog()
        {
            $model = new BasicLog();

            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    // form inputs are valid, do something here
                    return;                    
                }
            }

            return $this->render('log', [
                'model' => $model,
            ]);
        }

        
    public function actionTopnews($lang_id = 1)
            {
        //$lang_id = \Yii::$app->request->get('lang_id');
           
        /*
         * asArray() կրճատում ենք հարցումների քանակն ու շահում ժամանակ, Yii-ի լրացուցիչ հարցումները անջատվում են
         * where(['lang_id', $lang_id ]) - սովորական պայման
         * where(['like','lang_id', $lang_id ]) - օպերատրով պայման
         * andWhere(['<','id',5]) - AND օպերատորի փոխարեն
         * orderBy(['id'=>SORT_DESC]) - դասավորում ենք ըստ նվազման
         *  ->all() մեթոդով վերադարձնում է բազմաչափ զանգված
         *  ->one() մեթոդով վերադարձնում է միաչափ զանգված, միշտ գրել լիմիթով
         */
        
        $topnews_all = Topnews::find()
                    ->orderBy(['id'=>SORT_DESC])
                    ->asArray()
                    ->where(['like','lang_id', $lang_id ])
                    ->andWhere(['>','id',2])
                    ->andWhere(['<','id',5])
                    ->limit(3)
                    ->all(); // array - multy
        
        $topnews_one = Topnews::find()
                    ->orderBy(['id'=>SORT_DESC])
                    ->asArray()
                    ->where(['like','lang_id', $lang_id ])
                    ->andWhere(['>','id',2])
                    ->andWhere(['<','id',5])
                    ->limit(3)
                    ->one(); // array - simple, 
        
        /*
         * Calling nested query: from Topnews selecting Images         * 
         * $topnews = Topnews::find()->with('images')->where(['lang_id' => $lang_id])->all();
         * 
         * 
        */
        
        $slider = Topnews::find()
                ->where(['lang_id' => $lang_id])
                ->with('images')
                ->asArray()
                ->orderBy(['id' => SORT_DESC])
                ->limit(3)
                ->all();
        

        
        
        return $this->render('topnews',[
            
            'topnews_all' =>  $topnews_all,
            'topnews_one' =>  $topnews_one,
            'slider' => $slider,
            
            
        ]);
        
    }
}
