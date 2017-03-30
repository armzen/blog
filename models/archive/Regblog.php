<?php
/**
 * Description of Regblog
 *
 * @author arm
 */
namespace app\models;
use \yii\base\Model;
//use yii\db\ActiveRecord;
use Yii;
use app\models\User;


class Regblog extends Model {
    
    public static function tableName() {
        return 'user_1';
    }
    
    public $username;
    public $email;
    public $password_hash;
    public $status;
    // օգտատերերի ընթացիկ կարգավիճակը՝ ակտիվացված, ոչ ակտիվ, բլոկավորված
    
    
    
    public function rules() {
        parent::rules();
        return [
            /* client-side validation */
            [['username', 'email', 'password_hash'],'required'],      
            [['username', 'email', 'password_hash'],'trim'],            
            ['email', 'email'],
            ['username','string', 'min' => 2, 'tooShort' => 'min length is 2'],
            ['username','string', 'max' => 254, 'tooLong' => 'max length is 254'],
            ['password', 'string', 'length' =>[3,255]],
            
            /* Ունիկալության ֆիլտրեր, բազայի տվյալների հիման վրա */
            ['username','unique',
                'targetClass' => User::className(),
                'message' => 'This name is reserved.',
            ],

            ['email', 'unique',
                'targetClass' => User::className(),
                'message' => 'This email address is reserved.',
            ],            

            ['status', 'default','value' => User::STATUS_ACTIVE,'on' =>'default'],
            ['status', 'in', 
                'range'=> [User::STATUS_ACTIVE, User::STATUS_NOT_ACTIVE]
            ],
            
            /* server-side validation rules, without DB  */
            ['password_hash', 'passwordValidation'],
            ['username', 'nameValidate']           
        ];
    }
    
    public function passwordValidation($attribute) {
        if (($this->password) == 123) {
            $this->addError($attribute,'server side validation rule for password');
        }
    }
    
    public function nameValidate($attr) {
        if (is_numeric($this->username)) {
            $this->addError($attr,'server side validation rule for username');
        }
    }
    
    public function attributeLabels() {
        parent::attributeLabels();
        return [
            /* no need labels*/
            'username' => '',
            'password_hash' => '',
            'email' => ''
        ];
    }
    
    public function reg() {
        /*return TRUE;  //հաջող գրանցման իմիտացիա*/
        
        $user =new \app\models\User(); // app\models
        $user->username = $this->username;
        
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save();
        
        
    }
}
