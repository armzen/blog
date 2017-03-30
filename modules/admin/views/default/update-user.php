<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<h1><?= $this->context->action->uniqueId ?></h1>

<div id="update-user"> 
    <?php $form = ActiveForm::begin(['id' => 'update-user']); ?>
       <?= $form->field($one, 'id')->textInput(['readonly'=>'readonly'])->label('ID'); ?>
       <?= $form->field($one, 'name')->textInput()->label('User\'s name'); ?>
       <?= $form->field($one, 'pass')->textInput()->label('Password'); ?>
       <?= $form->field($one, 'email')->textInput()->label('E-mail'); ?>
       <?= Html::submitButton('Update User', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?> 
</div>

<code><?= __FILE__ ?></code>

