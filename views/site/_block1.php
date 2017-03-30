<?php
use yii\helpers\Html;
/* $model-ը արդեն ListView-ի մեթոդներից՝ renderItem() public method -ի հատտկություններից է,
 * վերադարձնում է տվյալների մոդելը արտապատկերման համար: 
 * 
 */
?>

<div class="col-lg-4">
<image src="<?= ' ../web/post_images/'.$model["iname"] ?>" class="img-responsive"/>
<h4><a><?= $model['header'].' id: '.$model['id'] ?></a></h4>
<p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">կարդալ &raquo;</a></p>
</div>
