<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>
<?= Html::beginTag('div', ['class' => 'col-md-5 col-md-offset-3']) ?>
    <h1>Blog/Login</h1>
    
        <div class="modal-dialog modal-md">
            <div class="modal-login">
                <div class="modal-header">                    
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <?= $form->field($loginform, 'email')->input('email');  ?>
                        <?= $form->field($loginform, 'password')  ?>                        
                </div>                
                <div class="modal-footer">
                        <?= Html::submitButton($content = 'Sub mit', ['class' =>'btn btn-primary']); ?>
                    <?php  ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
<?= Html::endTag('div') ?>
<?php
//app\controllers\macro($_POST);
/*
 * $_POST получает массив 
 *  [Login] => Array
        (
            [email] => arm@mail.ru
            [password] => armpas
        )
 * 
 * 
 *  */
//app\controllers\macro($loginform);
?>
