<?php
//app\controllers\macro($topnews[0]->images);



?>

<?php
//find()-> all();
echo '<strong> find()-> all() </strong> with foreach cycle <br>';
echo 'Type of "topnews_all"  ->> ' .gettype($topnews_all). '<br>';
echo 'Q-ty of "topnews_all" '.gettype($topnews_all).' ->> '.count($topnews_all) .'<br><br>';
foreach ($topnews_all as $top) {
    echo $top['id'].'. '.$top['header']. '<br>';
    echo $top['released'] . ' :released <br>';
    echo $top['intro_text'] . ' intro_text <br>';
    echo $top['image_id'] . ': image_id <br>';
}
?>
<?php
//find()-> one();
echo '<br><strong> find()-> one() </strong> without any cycle <br>';
echo 'Type of "topnews_one"  ->> ' .gettype($topnews_one). '<br>';
echo 'Q-ty of "topnews_one" '.gettype($topnews_one).' ->> '.count($topnews_all) .'<br><br>';
    echo $topnews_one['id'].'. '.$top['header']. '<br>';
    echo $topnews_one['released'] . ' :released <br>';
    echo $topnews_one['intro_text'] . ' intro_text <br>';
    echo $topnews_one['image_id'] . ': image_id <br>';
?>

<?php
// find()->with('images')->all();
echo '<br><strong>Slider</strong><br>';
echo 'Type of "slider"  ->> ' .gettype($slider). '<br>';
foreach ($slider as $slide){
    
    $images = $slide['images'];
    foreach ($images as $img) {
        $img_array[] =  $img['iname']. '<br>';
    } 
    
    
    $slide_array[] = $slide;
    echo $slide['id'].' '.$slide['released']. '<br>';
    echo $slide['header']. '<br>';
    echo $slide['image_id']. '<br>';
}

for($i = 0; $i < count($img_array); $i++) {
    echo $img_array[$i] .' : from cycle For <br>';
}

for($i = 0; $i < count($slide_array); $i ++) {
    echo $slide_array[$i]['header']. '<br>';
}

echo $img_array[0].'';
echo $img_array[1].'';
echo $img_array[2].'';

echo $slider[0]['header']. '<br>';
echo $slide_array[0]['header'].'<br>';

?>


        <ol class="carousel-indicators">
            <?php foreach ($slider as $k => $slide):
                
                $active = '';
                if($k == 0) {
                    $active = 'active';
                } ?>            
                <li data-target="#custom-bootstrap-carousel" data-slide-to="<?= $k ?>" class="<?= $active ?>"></li>    
            <?php endforeach; ?>
        </ol>



<?php
/* Topnews::find()->with('images')
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