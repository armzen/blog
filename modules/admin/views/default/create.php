<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1><?= $this->context->action->uniqueId ?></h1>

<div id="create">
    <?php $form = ActiveForm::begin(['id' => 'create-form']); ?>
    <?= $form->field($create, 'header')->textInput()->label('Header'); ?>
    <?= $form->field($create, 'image_id')->textInput()->label('image_id'); ?>
    <?= $form->field($create, 'date')-> ()->label('Date format: 17:19, 28 February, 2017'); ?>
    <?= $form->field($create, 'released')->textInput()->label('Released format: YEREVAN, FEBRUARY 28, ARMENPRESS.'); ?>
    <?= $form->field($create, 'intro_text')->textarea(['rows' => 2,])->label('Intro text'); ?>
    <?= $form->field($create, 'full_text')->textarea(['rows' => 5,])->label('Full text'); ?>
    
    <?= $form->field($create, 'lang_id')->dropDownList([ ["1"=>"English","2"=>"Ru","3"=>"AM"]]); ?>
   
    <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>


<?php
echo '<pre>';
//var_dump($_POST);
//var_dump($create);
echo '</pre>';
?>

<code><?= __FILE__ ?></code>