<?php

    foreach ($news as $top) {
        $header = $top['header'];
        $img    = $top['image_id'];
        $intro  = $top['intro_text'];
        echo $header. '<br>';
        echo $img. '<br>';
        echo $intro. '<br>';
    }
    
    
    
?>


