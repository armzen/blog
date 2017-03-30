<?php

/* 'yii\web\YiiAsset', miacnume Yii.js & jquery.js */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/basicCss.css',
        'css/blog-layout.css'
    ];
    public $js = [
        'js/blog.js',
        'js/bootstrap.js',
    ];
    public $jsOptions =[
        'position' =>  View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
 
