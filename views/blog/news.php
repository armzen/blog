<?php
use yii\helpers\Url;
    $this->registerCssFile('@web/css/blog-news.css','','news');
?>

<h3>Blog/News</h3>

<section id="news">
    
    <!-- Panel -->
    <?php    for ($k = 0; $k < count($news_array); $k ++) {  ?>
        <div class="panel panel-default">

            <!-- header -->
            <div class="panel-heading">
                <h4 class="text-center">
                    <?= $news_array[$k]['header'] ?>
                </h4>
            </div>

            <!-- body -->
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="col-md-4" id="news-image">
                        <?php echo Url::to("/post_images/$news_array[$k]['images'][0]['iname']", true); ?>
                        <img src="post_images/<?= $news_array[$k]['images'][0]['iname']; ?>" class="img-responsive" alt="Bako and Chako" id="img">
                        <h4 class="news-date"><code><?= $news_array[$k]['date'] ?></code></h4>
                    </div>
                    <h4><mark><?= $news_array[$k]['released'] ?></mark></h4>
                    <div id="full_text">
                        <?= $news_array[$k]['full_text'] ?>                    
                    </div>
                </div>            
            </div>
            <div class="panel-footer clearfix">
                <div class="pull-right">

                    <a href="<?= Yii::$app->urlManager->createUrl(['blog/index', 'lang_id'=>$lang_id])?>" class="btn btn-primary"> <?= $btn_main ?> </a>
                    <a href="<?= Yii::$app->urlManager->createUrl(['blog/allnews', 'lang_id'=>$lang_id])?>" class="btn btn-default"><?= $btn_all_news ?></a>
                </div>
            </div>
        </div>
    <?php } ?>
    
</section>
<code><?= __FILE__ ; ?></code>


