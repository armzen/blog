<?php
// Виджет ActiveForm для оформления формы
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>



<?= Html::beginTag('div', ['class' => 'col-md-5 col-md-offset-3']) ?>
    <h3>Blog/Registration</h3>
    <div class="modal-dialog modal-md">
        <div class="modal-signup">
            <div class="modal-header">                    
                <h4 class="modal-title">Registration</h4>
            </div>
            <div class="modal-body">   
                <?php $form = ActiveForm::begin(['id' => 'sign-form']); ?>
                    <!-- Все поля имеют прототипы имен в модели -->
                    <?= $form->field($signform, 'name')->textInput(); ?>
                    <?= $form->field($signform, 'email')->input('text'); ?>
                    <?= $form->field($signform, 'password')->passwordInput(); ?>
            </div>
            <div class="modal-footer">
                    <?= Html::submitButton('Sub meet', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    
<?= Html::endTag('div') ?>

                  

<?php
// Можно увидеть, что POST заполняется массивом Signup
// А обьект Signup после заполнения имеет три свойства - [name], [email], [password]
//app\controllers\macro($_POST);
 /*
  * ПОСТ
    Array
    (
        [_csrf] => Wi54YlRiXzUQTx5TMVJseyxUHwwaUDFTKGc0LBY3GgQLXRcOHwUvUQ==
        [Signup] => Array
            (
                [name] => Simon
                [email] => sim@mail.ru
                [password] => simpass
            )
    )
 * 
 */
 //app\controllers\macro($signform);
 /*
  * Signup
    app\models\Signup Object
    (
    [name] => Simon
    [email] => sim@mail.ru
    [password] => simpass
    )
  * 
  */
 ?>
