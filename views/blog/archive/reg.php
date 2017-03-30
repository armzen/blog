<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile('@web/css/blog-reg.css','','blog-reg');

/* @var $this yii\web\View */
/* @var $model app\models\Regblog */
/* @var $form ActiveForm */


?>

<div class="col-md-8 col-md-offset-2 sides">
<div class="blog-reg" id="blog_reg">
    
    <!-- Flash Messages -->
    <?php if (Yii::$app->session->hasFlash('regSuccess')): ?>
        <div class="col-md-12">
            <div class="row">
                <div class="alert alert-success fade in" id="reg-flash-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <?= Yii::$app->session->getFlash('regSuccess') ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('regError')): ?>
        <div class="col-md-12">
            <div class="row">
                <div class="alert alert-warning fade in" id="reg-flash-error">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong></strong> <?= Yii::$app->session->getFlash('regError') ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- form code -->
    <?php $form = ActiveForm::begin(
                ['options' =>
                    [
                        'id' => 'reg-form',
                        'class' => 'form-vertical'
                    ],                    
                ]
            ); ?>
        
        <?= $form->field($model, 'username')->textInput(['placeholder' => "anun"]) ?>
        <?= $form->field($model, 'email')->input('email', ['placeholder' => 'E-mail']) ?>
        <?= $form->field($model, 'password_hash')->passwordInput(['placeholder' => 'Password']) ?>
        <div class="panel-footer clearfix">
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
    
</div><!-- blog-reg -->
</div>