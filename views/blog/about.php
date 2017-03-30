<?php

use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;

foreach ($about as $ab) {
?>
<div class="col-md-4 text-center">    
       <img src="<?php echo Url::to('post_images/armenpress1.jpg', true); ?>" alt="armenpress"  id="img-about">
</div>



<div class="site-about">
    <h3><?= Html::encode($ab['ab_head']) ?></h3>
    <h4><?= Html::encode($ab['key_info']) ?></h4>
    <p>
        <?= Html::encode($ab['ab_text']) ?>
    </p>

    <code><?= __FILE__ ?></code>
</div>
<?php } ?>