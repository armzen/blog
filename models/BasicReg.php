<?php
/*
 *@ for user registration
 */
namespace app\models;
use yii\base\Model;
use Yii;

class BasicReg extends Model {
    public $username;
    public $email;
    public $password;
    
    public function rules() {
        parent::rules();
        return [
            [['username', 'email', 'password'], 'required', 'message' => 'հայերենա արդեն'],
            ['email', 'email']
        ];
    }
    public function attributeLabels() {
        parent::attributeLabels();
        return[
            'username' => 'օգտանուն',
            'password' => 'ծածկագիր',
            'email' => 'էլ. փոստs'
        ];
    }
}

/* copy and past to basicLogForm */
/* view-n sarqum enq Gii-ov*/


/* View Name - basic/reg ( irakanum views/basic/reg )
 * Model Class - app\models\BasicRegForm
 * 
 * --BasicController-i hamar talis e hetevyal code-@
    public function actionReg()
    {
        $model = new app\models\BasicRegForm();

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
 * 
 */
