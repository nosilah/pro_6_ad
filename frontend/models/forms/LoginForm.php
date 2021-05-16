<?php


namespace frontend\models\forms;

use frontend\models\User;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{


    public $username;
    public $password;


    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['password', 'required'],
            ['password', 'validatePassword'],


        ];
    }
    /*

@mothods return bool
*/

    public function login()
    {

        if ($this->validate()) {
            $user = User::findByUsername($this->username);

            
            
           return Yii::$app->user->login($user);
        }
    }


    public function validatePassword($attribute, $params)
    {


        $user = User::findByUsername($this->username);


        // echo '<pre>';
        // print_r($user);
        // echo '</pre>';
        // die;
        // echo '<pre>';
        // echo $user->password_hash;
        // die;

        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError($attribute, 'incorrect password');
        }
    }
}
