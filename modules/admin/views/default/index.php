<?php
use yii\helpers\Html;
?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    
    <div id="news-list">
        <a class="btn btn-success" href="<?= Yii::$app->urlManager->createUrl(['admin/default/create']) ?>">Create</a>
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>header</th>
                    <th>image_id</th>
                    <th>date</th>
                    <th>released</th>
                    <th>intro.text</th>
                    <th>full.text</th>
                    <th>lang.id</th>
                    <th>image name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($array as $arr) : ?>
                <tr>
                    <td><?= Html::encode($arr['id']) ; ?></td>
                    <td><?= Html::encode($arr['header']) ; ?></td>
                    <td><?= Html::encode($arr['image_id']) ; ?></td>
                    <td><?= Html::encode($arr['date']) ; ?></td>
                    <td><?= Html::encode($arr['released']) ; ?></td>
                    <td><?= Html::encode($arr['intro_text']) ; ?></td>
                    <td><?= Html::encode($arr['full_text']) ; ?></td>
                    <td><?= Html::encode($arr['lang_id']) ; ?></td>
                    <td><?= Html::encode($arr['images'][0]['iname']) ?></td>                    
                    <td>
                        <a href="<?= Yii::$app->urlManager->createUrl(['admin/default/update', 'id' => Html::encode($arr['id']) ]) ?>">Update</a>
                    </td>
                    <td>
                        <a href="<?= Yii::$app->urlManager->createUrl(['admin/default/delete', 'id' => Html::encode($arr['id']) ]) ?>">Delete</a>
                    </td>
                
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        
        ?>        
    </div>

    <p>
        <code><?= __FILE__ ?></code>
    </p>
</div>

