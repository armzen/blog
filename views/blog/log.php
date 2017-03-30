<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerCssFile('@web/css/blog-log.css','','blog-log');
/* @var $this yii\web\View */
/* @var $model app\models\Logblog */
/* @var $form ActiveForm */
?>
<div class="col-md-6 col-md-offset-3">
    <div class="blog-log" id="blog_log">

    <?php if (Yii::$app->session->hasFlash('logSuccess')): ?>
        <div class="col-md-12">
            <div class="row">
                <div class="alert alert-success fade in" id="log-flash-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <?= Yii::$app->session->getFlash('logSuccess') ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if (Yii::$app->session->hasFlash('logFall')): ?>
        <div class="col-md-12">
            <div class="row">
                <div class="alert alert-info fade in" id="log-flash-error">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>                    
                    <?= Yii::$app->session->getFlash('logFall') ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <?php $form = ActiveForm::begin(
                ['options' =>
                    [
                        'id' =>'log-form',
                        'class' => 'form-vertical',
                    ],
                ]
            ); ?>

        <?= $form->field($model, 'username')->textInput(['placeholder' =>'Name']) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="panel-footer clearfix">
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- blog-log -->
</div>