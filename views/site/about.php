<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

foreach ($about as $ab) {
?>
<div class="site-about">
    <h3><?= Html::encode($ab['ab_head']) ?></h3>
    <h4><?= Html::encode($ab['key_info']) ?></h4>
    <p>
        <?= Html::encode($ab['ab_text']) ?>
    </p>

    <code><?= __FILE__ ?></code>
</div>
<?php } ?>