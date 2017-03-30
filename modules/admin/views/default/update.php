<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<h1><?= $this->context->action->uniqueId ?></h1> 
 
<div id="update"> 
 <?php $form = ActiveForm::begin(['id' => 'update-form']); ?>
    <?= $form->field($one, 'header')->textInput()->label('Header'); ?>
    <?= $form->field($one, 'image_id')->textInput()->label('image_id'); ?>
    <?= $form->field($one, 'date')->textInput()->label('Date format: 17:19, 28 February, 2017'); ?>
    <?= $form->field($one, 'released')->textInput()->label('Released format: YEREVAN, FEBRUARY 28, ARMENPRESS.'); ?>
    <?= $form->field($one, 'intro_text')->textarea(['rows' => 2,])->label('Intro text'); ?>
    <?= $form->field($one, 'full_text')->textarea(['rows' => 5,])->label('Full text'); ?>
    <?= $form->field($one['images'][0], 'iname')->textInput()->label('language id (lang_id)'); ?>
    <?= $form->field($one, 'lang_id')->textInput()->label('language id (lang_id)'); ?>
    <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
 <?php ActiveForm::end(); ?> 
</div>

<?php
echo '<pre>';
    print_r($_POST);
echo '</pre>';
?>

<code><?= __FILE__ ?></code>