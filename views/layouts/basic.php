<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/*search form*/
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= Yii::$app->name; ?></title>
        <?php $this->head(); ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>        
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'NavBar Test',
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top',
                    'containerOptions' => 'container-fluid',
                ],              
            ]);           
            echo Nav::widget([
                'items' => [
                    [
                        'label' => 'Home <span class="glyphicon glyphicon-home"></span>',                        
                        'url' => ['/basic/index']
                    ],
                    [
                        'label' => 'About <span class="glyphicon glyphicon-menu-hamburger"></span>',
                        'url' => ['/basic/basicform']
                    ],
                    [
                        'label' => 'Menu/Content','url' =>['/basic/basic_record']
                    ],
                    [
                        'label'=>'Contacts', 'url' =>['/basic/basicform']
                    ],
                    
                ],                
                'options' => ['class' => 'nav navbar-nav'],
                'encodeLabels'=>false, // ete sa chdnenq, glyp-@ ktpi                
            ]);
            
            ActiveForm::begin([
                    'action'=>['/basic/search'],
                    'method'=>'post',
                    'options'=>['class' => 'navbar-form navbar-right'],               
                    ]);

                        echo '<div class="input-group input-group-sm">';
                        echo Html::input(
                            'type: text',
                            'search', 
                            '',
                            [
                                'class'=>'form-control',
                                'placeholder'=>"Search",
                            ]
                        );
                        echo '<span class="input-group-btn">';
                            echo Html::submitButton(
                                    '<span class="glyphicon glyphicon-search"></span>',
                                    [
                                        'class'=> 'btn btn-success',
                                    ]
                            );
                        echo '</span>';
                    echo '</div>';
                    
            ActiveForm::end();
            echo Nav::widget([
                'items' => [
                    [
                        'label' => 'Registration <span class="glyphicon glyphicon-grain"></span>',                        
                        'url' => ['/basic/basic-reg']
                    ],
                    [
                        'label' => 'Login <span class="glyphicon glyphicon-log-in"></span>',                        
                        'url' => ['/basic/basic-log']
                    ],
                    [
                        'label' => 'Logout <span class="glyphicon glyphicon-log-out"></span>',                        
                        'url' => ['/basic/logout']
                    ]
                    ],
                    'options' => ['class' => 'nav navbar-nav navbar-right'],
                    'encodeLabels'=>false 
                ]);
            NavBar::end();
            ?>
             <div class="container">
            <p>top of the page </p>           
            
            <a href="<?= Url::to(['/basic/', 'lang_id' => 'eng']) ?>" >eng</a>
            <a href="<?= Url::to(['/basic/', 'lang_id' => 'arm']) ?>" >arm</a>
            <a href="<?= Url::to(['/basic/', 'lang_id' => 'rus']) ?>" >rus</a><br>
            
           
                <?= $content ?>
                    
            <p>bottom of the page</p>
            </div>
            <div class="footer">
                <span></span>
                
            </div>
        </div>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>