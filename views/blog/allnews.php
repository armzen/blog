<?php 
    use yii\helpers\Url;
    $this->registerCssFile('@web/css/blog-allnews.css','','blog-allnews');
?>
<h3>Blog/Allnews</h3>


<section id=all-news'>
    
 <!-- Projects Row -->
    <div class="row">

        <?php for($i=0; $i < count($all_array); $i ++) { ?>                            
            <div class="col-md-4 portfolio-item">                        
                <!-- image with date -->
                <h4><code><?= $all_array[$i]['date'] ?></code></h4>

                <a href="<?= Yii::$app->urlManager
                            ->createUrl([
                            'blog/news',
                            'id' =>$all_array[$i]['id'],
                            'lang_id'=>$lang_id]) ?>" >
                                    <?= Url::to("post_images/$all_array[$i]['images'][0]['iname']", true); ?>
                    <img class="img-responsive" src='<?= Url::to("post_images/".$all_array[$i]['images'][0]['iname'], true); ?>' alt=" <?= $all_array[$i]['image_id']; ?>">                    
                    <!--img class="img-responsive" src="http://placehold.it/700x400" alt=""-->
                </a>

                <!-- header with intro-text -->
                <h4 class="allnews-header">
                    <a href="<?= Yii::$app->urlManager
                            ->createUrl([
                            'blog/news',
                            'id' => $all_array[$i]['id'],
                            'lang_id'=>$lang_id]) ?>">
                        <?= $all_array[$i]['header']; ?>
                    </a>
                </h4>

                <p> <?= $all_array[$i]['intro_text']; ?> </p>                        
            </div>
        <?php } ?>
    </div>
</section>

 <code><?= __FILE__ ; ?></code>