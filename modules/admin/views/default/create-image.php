<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
    <h1><?= $this->context->action->uniqueId ?></h1>

    <div id="add-form">
    <?php $form = ActiveForm::begin(['id' => 'image-form']); ?>
    <?= $form->field($newImage, 'id')
            ->textInput(['placeholder'=>'it will be generated automaticaly. Don\'t set manual if it\'s not necessary!'])
            ->label('id'); ?>
    <?= $form->field($newImage, 'iname')->textInput()->label('image name'); ?>
   
    <?= Html::submitButton('Add record', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>
    
    

<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>
<p><code><?= __FILE__ ?></code></p>
