<?php

namespace app\controllers;

use yii\base\Controller;
use yii\helpers\Html;
use Yii;
use app\models\Topnews;
use yii\data\Pagination;
use app\models\News;
use app\models\About;

use app\models\Contacts;
use app\models\ContactAddress;
use app\models\ContactFormLabels;

use app\models\Regblog;
use app\models\Logblog;



use app\models\User;
use app\models\Signup;
use app\models\Login;


?>

<?php

class BlogController extends AppController
{
    
    /* HOME index. */
    public function actionIndex($lang_id=1)
    {   
        
        /* Calling nested query: from Topnews selecting Images         * 
         * $topnews = Topnews::find()->with('images')->where(['lang_id' => $lang_id])->all(); */
        
        $slider = Topnews::getTopLast3($lang_id);
        
        foreach ($slider as $slide) {    
            $images = $slide['images']; // asArray
                foreach ($images as $img) {
                    $img_array[] =  $img['iname']. '<br>';
                }
            $slide_array[] = $slide;
        }
        return $this->render('index',[
            'img_array' => $img_array,
            'slide_array'=> $slide_array,
            'lang_id' =>$lang_id
        ]);
    }
    
    /* ONE NEWS news*/
    
    public function actionNews($lang_id)
    {
        $get_id = Html::encode(Yii::$app->request->get('id'));
        $lang_id = Html::encode($lang_id);
        
        $news =  News::getNewsById($lang_id, $get_id);        
        foreach ($news as $news_item) {
            $news_array[] = $news_item;            
                $images = $news_item['images']; // asArray
                foreach ($images as $img) {
                    $img_array[] =  $img['iname'];
                }            
        }
        
        $btn_main = News::getBtnTranslate($lang_id)['btn_main'];
        $btn_all_news =News::getBtnTranslate($lang_id)['btn_all_news'];

        return $this->render('news',
            [
                'news_array' => $news_array,
                'img_array' => $img_array,
                'get_id' =>$get_id,
                'lang_id'=>$lang_id,
                'btn_main'=>$btn_main,
                'btn_all_news'=>$btn_all_news
            ]);
    }
    
    /* NEWS allnews */
    public function actionAllnews($lang_id)
    {
        $lang_id = Html::encode($lang_id);
        $all = Topnews::getAllnews($lang_id);
        
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $all->count(),
        ]);
        
        $allnews = $all->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        
        foreach ($allnews as $all) {
            $all_array[] = $all;            
                $images = $all['images']; // asArray
                foreach ($images as $img) {
                    $img_array[] =  $img['iname'];
                }            
        }
        
        return $this->render(
                'allnews',
                [                  
                    'all_array'=> $all_array,
                    'img_array' => $img_array,
                    'lang_id' => $lang_id,
                    'pagination'=>$pagination
                ]);
    }
    
    public function actionAbout($lang_id)
    {
        $lang_id = Html::encode($lang_id);
        $about = About::getAbout($lang_id);
        return $this->render('about',
                [
                    'about'=> $about,
                    'lang_id' =>$lang_id
                ]);
    }
    
    public function actionContacts($lang_id)
    {      
        $lang_id = Html::encode($lang_id);
        $model = new Contacts();
         if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
              $name = $model['name'];
              $success = $name . "Thank you for contacting us. We will respond to you as soon as possible.";            
         }else{
             $success = '';
         }
         
        //contact_translate
        $contactAddress = ContactAddress::getAddressContent($lang_id);
        $formLabels = ContactFormLabels::getFormLabels($lang_id);
        
        // Address translate
        foreach ($contactAddress as $cont) {
           $our_office = $cont['our_office'];
           $address = $cont['address'];
           $street = $cont['street'];
           $tel = $cont['tel'];
           $self_mail = $cont['self_mail'];
           $question_info = $cont['question_info'];
        }
        
        return $this->render('contacts', [
            
            //'contacts' =>$contact,
            'our_office' => $our_office,
            'address' => $address,
            'street' => $street,
            'tel' => $tel,
            'self_mail' => $self_mail,
            'question_info' => $question_info,
            'form_labels'=> $formLabels,
            'model' => $model,
            'success' =>$success
            ]);
    }

    /* REGISTRATION SIGNUP */
    public function actionSignup($lang_id)
    {
        $lang_id = Html::encode($lang_id);
       $signform = new Signup();

        if(isset($_POST['Signup'])) {
           $signform->attributes = Yii::$app->request->post('Signup');
           if($signform ->validate())
             {             
               $signform->signup(); // после заполнения и проверок вызываем функцию signup() из модели User
               return $this->redirect(['blog/index', 'lang_id' => $lang_id]);              
             }
        }
        else{ /*echo 'sorry, but noop';*/ }
        return $this->render('signup',[
             'signform' => $signform,
             'lang_id' => $lang_id

        ]);
    }

    public function actionLogin($lang_id)
    {
        /* Պարզապես ջնջում է օգտատերի տվյալները սեսսիյից: */
        $lang_id = Html::encode($lang_id);
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['/blog/index']);
        }
        
        $loginform = new Login();        
        if(Yii::$app->request->post('Login')) {            
            $loginform ->attributes= Yii::$app->request->post('Login');
            if($loginform->validate()) {
                \Yii::$app->user->login($loginform->getUser());               
                return $this->redirect(['blog/index', 'lang_id' => $lang_id]);
                //return $this->goBack();
                //var_dump('We are logged in');
            }
            else{ /* var_dump('something wrong!'); */ }
        }        
        return $this->render('login',['loginform' => $loginform]);
    }
    
    public function actionLogout($lang_id)
    {
        /* եթե հյուր չի՝ պետքա կարողանա դուրս գա համակարգից: */
        $lang_id = Html::encode($lang_id);
        if(!\Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
            return $this->redirect(['/blog/login', 'lang_id' => $lang_id]);
        }
        
    }
    
    /*
     * Կարևոր է !!!!!!!!!
     * 
     * $app->user և User - մոդելը տարբեր բաներ են, չխառնել !
     * 1-ը user-ի կարգավիճակի կառավարման կոմպոնենտ է
     * 2-ը user-ի ստեղծման, գրանցման, պահպանման մոդելն է
     * 
     * 1. user կոմպոնենտի login() մեթոդը հնար է տալիս գրանցել user-ի տվյալները session-ի մեջ,
     * որից հետո մեր user-ը համարվում է աուտենտիֆիկացիա անցած:
     * 1.2 Անհրաժեշտ է ռեալիզացնել identityInerface, User model-ի համար՝ դրեսս կոդի նման մի բան՝ մուտքի մոտ:
     *      Դա արվում է User model-ում, "implements" keyword-ի միջոցով:
     *      user component-ը կարող է ըդնունել User - մոդելին identityInerface - ի միջոցով:
     * 
     * 
     * // проверка на то, что текущий пользователь гость (не аутентифицирован)
     *    $isGuest = Yii::$app->user->isGuest;
     */
    
    
        public function actionTopnews($lang_id = 1)
    {
        // Սա ընդհանրապես չի օգտագործվում, պահվում է
        // քոմենտների համար զուտ
        //$lang_id = \Yii::$app->request->get('lang_id');
           
        /*
         * asArray() կրճատում ենք հարցումների քանակն ու շահում ժամանակ, Yii-ի լրացուցիչ հարցումները անջատվում են
         * where(['lang_id', $lang_id ]) - սովորական պայման
         * where(['like','lang_id', $lang_id ]) - օպերատրով պայման
         * andWhere(['<','id',5]) - AND օպերատորի փոխարեն
         * orderBy(['id'=>SORT_DESC]) - դասավորում ենք ըստ նվազման
         *  ->all() մեթոդով վերադարձնում է բազմաչափ զանգված
         *  ->one() մեթոդով վերադարձնում է միաչափ զանգված, միշտ գրել լիմիթով
         */
        /*
         *$topnews_all = Topnews::find()
                    ->orderBy(['id'=>SORT_DESC])
                    ->asArray()
                    ->where(['like','lang_id', $lang_id ])
                    ->andWhere(['>','id',2])
                    ->andWhere(['<','id',5])
                    ->limit(3)
                    ->all(); // array - multy
        
        $topnews_one = Topnews::find()
                    ->orderBy(['id'=>SORT_DESC])
                    ->asArray()
                    ->where(['like','lang_id', $lang_id ])
                    ->andWhere(['>','id',2])
                    ->andWhere(['<','id',5])
                    ->limit(3)
                    ->one(); // array - simple,
         *
         */
        
        /*
        if(empty(Yii::$app->request->get('lang_id'))){
            $lang_id = '1';
        }else{
        $lang_id = Yii::$app->request->get('lang_id');
        }
         * */
         
        //$menu = Yii::$app->db->createCommand('SELECT * FROM menu')->queryAll();
        $lastNews = Topnews::getTopLast3($lang_id);
        $hello = 'Hello World!';       
            
        return $this->render('topnews',[
            'hello' => $hello,
            'lastNews' => $lastNews,
            'lang_id' =>$lang_id,

        ]);       
    }
    
    
    
}














/*
            [id] => 3
            [header] => Բակո Սահակյանը և Անջեյ Կասպշիկը քննարկել են Ադրբեջանի դիվերսիոն ներթափանցման վերջին փորձը
            [image_id] => 3
            [date] => 17:19, 28 Փետրվար, 2017
            [released] => ԵՐԵՎԱՆ, 28 ՓԵՏՐՎԱՐԻ, ԱՐՄԵՆՊՐԵՍ
            [intro_text] => Արցախի Հանրապետության Նախագահ Բակո Սահակյանը փետրվարի 28-ին ընդունել է ԵԱՀԿ գործող նախագահի անձնական ներկայացուցիչ, դեսպան Անջեյ Կասպշիկին:
            [full_text] => Արցախի Հ
 * 
 */
 /*
  * $email = $model['email'];
  * $message = $model['mess'];
  * 
    $to = 'armenarakelyan85@gmail.com';
    $email_subject = "Website Contact Form:  $name";
    $email_body = "You have received a new message from your website 'blog' \n\n".
            "Details \n\n:".
            "Name : $name \n\n".
            "E-mail: $email \n\n".
            "Message: \n $message";
    $headers = "From: noreply@blog.am \n";
    $headers .= "Reply-To: $email";

    mail($to,$email_subject, $email_body, $headers);
    */