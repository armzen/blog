<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>
<h1><?= $this->context->action->uniqueId ?></h1>

<div id="image-upload">
    <div class="row">
        <?php if (Yii::$app->session->hasFlash('hajoxak')): ?>
           <div class="col-md-6">           
                   <div class="alert alert-success fade in" id="reg-flash-success">
                       <a href="#" class="close" data-dismiss="alert">&times;</a>
                       <?= Yii::$app->session->getFlash('hajoxak') ?>
                   </div>
               </div>       
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-md-6">

                <legend>Chose the image file from your computer.</legend>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                    <?= $form->field($imgUp, 'imageFile')->fileInput() ?>
                <div class="btn-group"> 
                    <?= Html::submitButton('Upload', ['class' => 'btn btn-success']); ?>
                    <a class="btn btn-primary"
                        href="<?= Yii::$app->urlManager->createUrl(['admin/default/create-image']) ?>">
                        Create new Record
                    </a>
                </div>
                <?php ActiveForm::end() ?>

        </div>
    </div>
</div>

<div id="img-table">
    <table class="table table-bordered table-responsive">
        
        <tr>
            <th>#</th>
            <th>Image name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($imgList as $list) : ?>
        <tr>
            <td><?= Html::encode($list['id']) ?></td>
            <td><?= Html::encode($list['iname']) ?></td>
            <td>
                <a href="<?= Yii::$app->urlManager->createUrl(['admin/default/update-image', 'id' => Html::encode($list['id']) ]); ?>">Update</a>
            </td>
            <td>
                <a href="<?= Yii::$app->urlManager->createUrl(['admin/default/delete-image', 'id' => Html::encode($list['id']) ]); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>


<?php
echo '<pre>';
print_r($imgList);
echo '</pre>';
?>
<code><?= __FILE__ ?></code>

