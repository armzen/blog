<?php
/*
 *@ For user enter` Authentication
*/
namespace app\models;
use yii\base\Model;
use Yii;

class BasicLog extends Model {
    public $username;
    public $password;
    
    public function rules() {       
        
        parent::rules();
        return [
            [['username'], 'required', 'message'=>'anun gri'],
            [['password'], 'required', 'message'=>'cackagir gri'],
            
        ];
    }
    
    public function attributeLabels() {
        parent::attributeLabels();
        return[
            'username' => 'անուն',
            'password' => 'ծածկագիր',
        ];
    }
}

/* nuyn basicRegForm-n e, bacarutyammb, vor estex bacakayum e email-@*/
/* view-n sarqum enq Gii-ov : Form Generator-ov */
/*Gii - > site/index.php?r=Gii */

/* View Name */
/* View Name - basic/log */
/* Model Class - app\models\BasicLogform */
/*

 * public function actionLog()
    {
        $model = new app\models\BasicLogform();

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
 */

