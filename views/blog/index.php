<?php

/* find()->with('images')->all();
 * for debbuging
 * 
    for($i = 0; $i < count($img_array); $i++) {
        echo $img_array[$i] .' : from cycle For <br>';
    }

    for($i = 0; $i < count($slide_array); $i ++) {
        echo $slide_array[$i]['header']. '<br>';
        echo $slide_array[$i]['images'][0]['iname'];

    }
 * 
 */
// how to include CSS and JS files
/* @alert jquery: internal JS*/
// $this->registerJs('alert("Hello World!")', $this::POS_READY, 'message-hello');
$this->registerJsFile('@web/js/blog-index.js', ['position' => $this::POS_HEAD], 'blog-index');
$this->registerCss('body{background-color:#fdfdfd}', ['options'=>'body'], 'body-style');
$this->registerCssFile('@web/css/blog-index.css','','blog-index');

use yii\helpers\Url;
?>
<h3>blog/topnews </h3>
<section id='top-news'>
<div class="row">
    <!-- user interface identity (by id) -->
     <?php // app\controllers\macro(\Yii::$app->user->identity); ?>
    
    <div class="col-md-6">
    <div id="custom-bootstrap-carousel" class="carousel slide" data-ride="carousel" data-interval="50000"> 
        <ol class="carousel-indicators">
            <?php for($i = 0; $i < count($img_array); $i ++) :
                
                $active = '';
                if($i == 0) {
                    $active = 'active';
                } ?>            
                <li data-target="#custom-bootstrap-carousel" data-slide-to="<?= $i ?>" class="<?= $active ?>"></li>    
            <?php endfor; ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php for ($j = 0; $j < count($slide_array); $j ++) :            

                $active = '';
                if($j == 0) {
                    $active = 'active';
                } ?>
                <div class="item <?= $active;  ?>" > 
                    <img src="post_images/<?= $slide_array[$j]['images'][0]['iname']; ?>" alt="news-<?= $j; ?>">
                    <div class="carousel-caption"> <?= $slide_array[$j]['header']; ?></div> 
                </div>
            <?php endfor; ?>            
        </div>
       <a class="left carousel-control" href="#custom-bootstrap-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#custom-bootstrap-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div> <!-- End of left side -->
    
 <?php    for ($k = 0; $k < count($slide_array); $k ++) {  ?>
    <div class="col-md-6">
         <div class="well">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl([
                                    'blog/news',
                                    'id'=>$slide_array[$k]['id'], 
                                    'lang_id'=>$lang_id]) ?>">
                                    <img src="post_images/<?= $slide_array[$k]['images'][0]['iname']; ?>" alt="<?= $slide_array[$k]['id']; ?>" class="img-responsive">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8">                        
                        <h5><?= $slide_array[$k]['released'] ?></h5>
                        <ul class="list-unstyled">
                            <li>
                                <h4>
                                    <a href="<?= Yii::$app->urlManager->createUrl([
                                        'blog/news',
                                        'id' => $slide_array[$k]['id'],
                                        'lang_id'=>$lang_id]) ?>">
                                        <?= $slide_array[$k]['header'] ?>
                                    </a>
                                </h4>
                            </li>
                            <li><?= $slide_array[$k]['date'] ?>
                            </li>
                        </ul>                       
                    </div>
                </div> <!-- row -->
         </div> <!-- well -->
    </div> <!-- end of news1 -->
    <?php  } ?>
    
</div>
</section>
<?php
//echo 'Type of "slider"  ->> ' .gettype($slider). '<br>';
//app\controllers\macro($slide_array);


/* Topnews::find()->with('images')
 * 
foreach ($topnews as $top) {    
    echo '<ul>';
        echo '<li>'.$top['header'].'</li>';
        $images = $topnews[0]->images;
      //$images = $top->images;
            foreach ($images as $image) {
                echo '<ul>';
                   echo '<li>'.$image['iname'].'</li>';       
               echo '</ul>';
            }        
    echo '</ul>';
 }
*/
?>