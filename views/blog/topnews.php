<?php

/* index of view/blog */
/* @var $this yii\web\View */

/* external JS: from @web/js path */

/* @alert jquery: internal JS*/
// $this->registerJs('alert("Hello World!")', $this::POS_READY, 'message-hello');
$this->registerCssFile('@web/css/blog-index.css','','blog-index');
$this->registerCss('body{background-color:#fdfdfd}', ['options'=>'body'], 'body-style');
$this->registerJsFile('@web/js/blog-index.js', ['position' => $this::POS_HEAD], 'blog-index');

use app\components\Menuwidget;
use yii\helpers\Url;
use app\controllers;
?>

<h3>blog/topnews </h3>

<section id='top-news'>
  <div class="row">      
    <div class="col-md-6">
        
    <div id="custom-bootstrap-carousel" class="carousel slide" data-ride="carousel" data-interval="5000"> 
        <ol class="carousel-indicators">
            <?php foreach ($lastNews as $key => $slider):
                
                $active = '';
                if($key == 0) {
                    $active = 'active';
                } ?>            
                <li data-target="#custom-bootstrap-carousel" data-slide-to="<?= $key ?>" class="<?= $active ?>"></li>    
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php foreach ($lastNews as $key => $slider):            

                $active = '';
                if($key == 0) {
                    $active = 'active';
                } ?>
                <div class="item <?= $active;  ?>" > 
                    <img src="../web/post_images/<?= $slider['iname'] ?>" alt="news-<?= $key; ?>">
                    <div class="carousel-caption"> <?= $slider['header']; ?></div> 
                </div>
            <?php endforeach; ?>            
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
    
    <!-- right side -->
    <?php    foreach ($lastNews as $last) { ?>
    <div class="col-md-6">
         <div class="well">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl([
                                    'blog/news',
                                    'id'=>$last['id'], 
                                    'lang_id'=>$lang_id]) ?>">
                                    <img src="../web/post_images/<?= $last['iname']; ?>" alt="<?= $last['iname']; ?>" class="img-responsive">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8">                        
                        <h5><?= $last['released'] ?></h5>
                        <ul class="list-unstyled">
                            <li>
                                <h4>
                                    <a href="<?= Yii::$app->urlManager->createUrl([
                                        'blog/news',
                                        'id' => $last['id'],
                                        'lang_id'=>$lang_id]) ?>">
                                        <?= $last['header'] ?>
                                    </a>
                                </h4>
                            </li>
                            <li><?= $last['date'] ?>
                            </li>
                        </ul>                       
                    </div>
                </div> <!-- row -->
         </div> <!-- well -->
    </div> <!-- end of news1 -->
    <?php } ?>

  </div>
</section>