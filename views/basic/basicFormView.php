<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<?php if(($model->name) && ($model->email)) { ?>
<p> You have entered following data.</p>
<label>Name: </label> <?= $model->name; ?><br/>
<label>Email: </label> <?= $model->email; ?>   
<?php } ?>


<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Your Name') ?>
    <?= $form->field($model, 'email')->label('Your Email') ?>
    <?= Html::submitButton('Send'); ?>

<?php ActiveForm::end() ?>

