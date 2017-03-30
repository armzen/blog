<?php

foreach ($images as $image) {     
    $items[]= $image['id'];
    $img[]=$image['iname'];
 }
?>
    
        <?= $items[0] ?><br>
<img src= "<?php echo $img[0]; ?>" alt="<?= $items[0] ?>" />
        <?= $items[1] ?><br>
<img src= "<?php echo $img[1]; ?>" alt="<?= $items[1] ?>" />
        <?= $items[2] ?><br>
<img src= "<?php echo $img[2]; ?>" alt="<?= $items[2] ?>" />