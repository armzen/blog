<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<h1><?= $this->context->action->uniqueId ?></h1>
<div id="update-image"> 
    <?php $form = ActiveForm::begin(['id' => 'update-image-form']); ?>
       <?= $form->field($one, 'id')->textInput(['readonly'=>'readonly'])->label('ID'); ?>
       <?= $form->field($one, 'iname')->textInput()->label('User\'s name'); ?>
      
       <?= Html::submitButton('Update Image', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?> 
</div>
<p><code><?= __FILE__ ?></code></p>

