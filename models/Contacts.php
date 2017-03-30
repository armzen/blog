<?php

namespace app\models;
use yii\base\Model;
use Yii;

/**
 * Description of Contacts
 *
 * @author arm
 */

class Contacts extends Model{

    public $name;
    public $email;
    public $mess;
    
    public function rules()
            
    {
        return [
            // name, email, subject and body are required
            [['name'], 'required', 'message' =>'Name cannot be blank.'],
            [['email'], 'required','message' => 'E-mail cannot be blank.'],
            [['mess'], 'required','message' => 'Message cannot be blank.'],
            // email has to be a valid email address
            ['email', 'email'],            
        ];
    }
    
    /* admin's email as a function's parameter / see Controller.. params['adminEmail']/ */
    /* adminEmail is set into config/params.php */
    /* we can use mail-layout too, for that we must give it as a compose('myMail') parameter
     * compose will find it in "mail/layout/myMail.php"  path */
    
    /* For the real sending, we must change web.php->mailer configuration
     * 1) 'useFileTransport' => TRUE, must to be FALSE !!!
     * 
     * 2) config settings SMTP for that mail, which we will use / see yii\swiftmailer\mailer
       'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'localhost',
            'username' => 'username',
            'password' => 'password',
            'port' => '587',
            'encryption' => 'tls',
        ],
    ],
     * 3) config your e-mail...
     *     -= GMAIL =-
     *     smtp.gmail.com           -> host
     *     Порт 465 (требуется SSL) ->port 465 and encryption SSL
     *     Порт 587 (требуется TLS)
     *     Подозрительные сообщения могут фильтроваться.
     *     2000 сообщений в день.
     * 
     * 4) mail layout's CSS must to be inline, mail format doesn't support external CSS
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])                
                ->setTextBody($this->mess)
                ->send();
            return true;
        }
        return false;
    }
}
