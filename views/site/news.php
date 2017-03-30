<?php
use yii\helpers\Html;

 foreach($news as $new) { ?>
        <h3> <?= htmlclean($new['header']) ?>    </h3>
        <h4> <?= 'image_id '.$new['image_id'] ?> </h4>
      <mark> <?= $new['date'] ?>     </mark>
        <h4> <?= $new['released'] ?> </h4>
         <p> <?= $new['full_text'] ?></p>
        <h4>
            <code><?= __DIR__ ?></code>
        </h4>		
		
<?php	}  
function htmlclean($var) {
	$var = Html::encode($var);
	return $var;
}

?>



