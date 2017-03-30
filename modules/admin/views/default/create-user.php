<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1><?= $this->context->action->uniqueId ?></h1>

<div id="create-user">
    <?php $form = ActiveForm::begin(['id' => 'create-user-form']); ?>
    <?= $form->field($create, 'name')->textInput()->label('Username'); ?>
    <?= $form->field($create, 'pass')->textInput()->label('Password'); ?>
    <?= $form->field($create, 'email')->input('email')->label('E-mail'); ?>

   
    <?= Html::submitButton('New User', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>


<?php
echo '<pre>';
//var_dump($_POST);
//var_dump($create);
echo '</pre>';
?>

<code><?= __FILE__ ?></code>