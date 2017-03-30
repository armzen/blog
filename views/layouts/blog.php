<?php

use app\assets\AppAsset;
use Yii\helpers\Html;
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
        $home = $menu[0]['home'];
        $news = $menu[0]['news'];
        $about= $menu[0]['about'];
        $contacts = $menu[0]['contacts'];
        $reg = $menu[0]['reg'];
        $login = $menu[0]['sign_in'];
        $logout = $menu[0]['sign_out'];
        $arm = $menu[0]['arm'];
        $eng = $menu[0]['eng'];
        $rus = $menu[0]['rus'];
        $menu_lang_id = $menu[0]['lang_id'];
        $menu_id=$menu[0]['id'];
        
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
                'brandLabel' => 'Logo',
                //'brandUrl' => Yii::$app->homeUrl,
                'brandUrl' => Url::to(['blog/index', 'lang_id' => $lang_id]),
                'renderInnerContainer' => FALSE,
                'options' => [
                    'class' => 'navbar-default ', //navbar-fixed-top // navbar-inverse : ստանդարտ կլասներ                    
                ],                
            ]);
            
            echo Nav::widget([
                'items' => [
                    [
                        'label' => $home .' <span class="glyphicon glyphicon-home"></span>',                        
                        'url' => ['blog/index', 'lang_id'=>$lang_id]
                    ],
                    [
                        'label' => $news .' <span class="glyphicon glyphicon-flag"></span>',                        
                        'url' => ['/blog/allnews','lang_id'=>$lang_id]
                    ],
                    [
                        'label' => $about .' <span class="glyphicon glyphicon-menu-hamburger"></span>',
                        'url' => ['/blog/about','lang_id'=>$lang_id]
                    ],
                    [
                        'label' => $contacts .' <span class="glyphicon glyphicon-list-alt"></span>',
                        'url' =>['/blog/contacts','lang_id' =>$lang_id]
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
                        echo Html::a(" $arm ", Url::to(['/blog/index',  'lang_id' => 1]));
                        echo Html::a(" $eng ", Url::to(['/blog/index',  'lang_id' => 2]));
                        echo Html::a(" $rus ", Url::to(['/blog/index',  'lang_id' => 3]));
                    echo '</div>';
            ActiveForm::end();

            echo Nav::widget([
                'items' => [
                     [
                        'label' => $reg. ' <span class="glyphicon glyphicon-grain"></span>',                        
                        'url' => ['/blog/signup', 'lang_id' => $lang_id],                        
                    ],
                    /* @var $logout type */
                    Yii::$app->user->isGuest ? (
                        ['label' => $login. ' <span class="glyphicon glyphicon-log-in"></span>', 
                            'url' => ['/blog/login', 'lang_id' => $lang_id]]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/blog/logout','lang_id' => $lang_id], 'post')
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

 <!-- Language bar proto -->
 <!-- Simple widget 'elloy savax vani' -->
    <?php
        /*
        $lang_bars = Yii::$app->db->createCommand("SELECT * FROM `lang_translate` WHERE lang_id = :lang_id")
                ->bindValue(':lang_id', $lang_id)
                ->queryAll();
        foreach ($lang_bars as $lang_bar) { ?>
        <div class="lang_bar">
            <a href="<?= Url::to(['blog/', 'lang_id' => 'eng']) ?>" >eng</a>
            <a href="<?= Url::to(['blog/', 'lang_id' => 'arm']) ?>" >arm</a>
            <a href="<?= Url::to(['blog/', 'lang_id' => 'rus']) ?>" >rus</a>
        </div>
    <?php } */?>