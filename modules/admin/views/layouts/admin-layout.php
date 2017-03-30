<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\Menuwidget;
use app\models\Menu;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <?= \yii\helpers\Html::csrfMetaTags() ?>
        <meta charset=" <?= Yii::$app->charset; ?> ">        
        <title> <?= Yii::$app->name; ?> </title>
        <?php $this->registerMetaTag(['name'=>'viewport','content'=>'width=device-width, initial-scale=1']) ?>
        <?= Html::csrfMetaTags(); ?>
        <?= $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody(); ?>
        
       <!-- Default languange -->
        <?php        
            if(empty(Yii::$app->request->get('lang_id'))){
                $lang_id = 1;
            }else{
                $lang_id = Yii::$app->request->get('lang_id');
            }   
        ?>
        
        <!-- Menu Translation from DB -->
        <?php
        $params = [
            ':lang_id' => $lang_id,
            //':status' => 1
            ];
        $menu = Yii::$app->db->createCommand("SELECT * FROM `menu` WHERE lang_id =:lang_id ")
                ->bindValues($params)
                ->queryAll();
        $home = Html::encode($menu[0]['home']);
        $news = Html::encode($menu[0]['news']);
        $about= Html::encode($menu[0]['about']);
        $contacts = Html::encode($menu[0]['contacts']);
        $reg = Html::encode($menu[0]['reg']);
        $login = Html::encode($menu[0]['sign_in']);
        $logout = Html::encode($menu[0]['sign_out']);
        $arm = Html::encode($menu[0]['arm']);
        $eng = Html::encode($menu[0]['eng']);
        $rus = Html::encode($menu[0]['rus']);
        $menu_lang_id = Html::encode($menu[0]['lang_id']);
        $menu_id= Html::encode($menu[0]['id']);
        
        /*
            [home] => Home
            [news] => News
            [about] => About
            [contacts] => Contacts
            [sign_in] => Sign in
            [sign_out] => Sign out
            [arm] => ARM
            [eng] => ENG
            [rus] => RUS
            [lang_id] => eng
         * 
         */
        //echo '<pre>';
        //print_r($menu);
        //echo '</pre>';
        ?>
        
       <!-- Navbar block -->
        <?php

            NavBar::begin([               
                'brandLabel' => 'Admin Panel',
                //'brandUrl' => Yii::$app->homeUrl,
                'brandUrl' => Url::to(['/blog/index', 'lang_id' => Html::encode($lang_id) ]),
                'renderInnerContainer' => FALSE,
                'options' => [
                    'class' => 'navbar-default ', //navbar-fixed-top // navbar-inverse : ստանդարտ կլասներ                    
                ],                
            ]);
            
            echo Nav::widget([
                'items' => [
                    
                    [
                        'label' => Html::encode($home) .' <span class="glyphicon glyphicon-home"></span>',                        
                        'url' => ['/blog/index', 'lang_id' => Html::encode($lang_id) ]
                    ],
                    [
                        'label' => Html::encode($news).' <span class="glyphicon glyphicon-flag"></span>',                        
                        'url' => ['/blog/allnews', 'lang_id' => Html::encode($lang_id) ]
                    ],
                    [
                        'label' => 'Imagine' .' <span class="glyphicon glyphicon-picture"></span>',
                        'url' => ['default/image-upload','lang_id' => Html::encode($lang_id) ]
                    ],
                    [
                        'label' => 'Posts' .' <span class="glyphicon glyphicon-list-alt"></span>',
                        'url' =>['default/index','lang_id' => Html::encode($lang_id) ]
                    ],
                    [
                        'label' => 'Users' .' <span class="glyphicon glyphicon-list-alt"></span>',
                        'url' =>['default/myusers','lang_id' => Html::encode($lang_id) ]
                    ],
                ],                
                'options' => ['class' => 'nav navbar-nav'],
                'encodeLabels'=>false, // ete sa chdnenq, glyph-@ ktpi
                
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
                    echo '<div id="lang-bar">';
                        echo Html::a(Html::encode(" $arm "), Url::to(['default/myusers',  'lang_id' => 1]));
                        echo Html::a(Html::encode(" $eng "), Url::to(['default/myusers',  'lang_id' => 2]));
                        echo Html::a(Html::encode(" $rus "), Url::to(['default/myusers',  'lang_id' => 3]));
                    echo '</div>';
            ActiveForm::end();

            echo Nav::widget([
                'items' => [
                     [
                        'label' => Html::encode($reg). ' <span class="glyphicon glyphicon-grain"></span>',                        
                        'url' => ['/blog/signup', 'lang_id' => Html::encode($lang_id) ],                        
                    ],
                    /* @var $logout type */
                    Yii::$app->user->isGuest ? (
                        ['label' => Html::encode($login). ' <span class="glyphicon glyphicon-log-in"></span>', 
                            'url' => ['/blog/login', 'lang_id' => Html::encode($lang_id) ]]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/blog/logout','lang_id' => Html::encode($lang_id) ], 'post')
                        . Html::submitButton(
                        //    'Logout (' . Yii::$app->user->identity->username . ')',
                            $logout.
                            ' ('. Yii::$app->user->identity->email . ') '.                        
                            ' <span class="glyphicon glyphicon-log-out"></span> ',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                    
                    /*
                     *  [
                        'label' => $login. ' <span class="glyphicon glyphicon-log-in"></span>',                        
                        'url' => ['/blog/log', 'lang_id' => $lang_id]
                    ],
                    [
                        'label' => $logout. '<span class="glyphicon glyphicon-log-out"></span>',                        
                        'url' => ['/blog/logout']
                    ]
                     */
                    ],
                    'options' => ['class' => 'nav navbar-nav navbar-right'],
                    'encodeLabels'=>false 
                ]);
              
            NavBar::end();
                        echo '</div>'; 
            ?>
        
        <div class="container-fluid">         
            <p> <small>start of page: layout.</small></p>
            
                <?= $content; ?>
            
            <p> <small>end of page: layout.</small></p>            
        </div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage(); ?>

 
