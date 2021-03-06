<?php


namespace frontend\models\forms;

use frontend\models\User;
use Yii;
use yii\base\Model;




class SignupForm extends Model
{


    public $username;
    public $email;
    public $password;


    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['username'], 'unique', 'targetClass' => User::className()],


            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::className()],

            ['password', 'required'],
            ['password', 'string', 'min' => 6]
        ];
    }
/*

@mothods return bool
*/

    public function save()
    {

        if ($this->validate()){
            $user = new User();
            $user->email = $this->email;
            $user->username = $this->username;
            $user->created_at = $time = time();
            $user->updated_at = $time;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            return $user->save();
        }



        return false;
        
    }


    public function update()
    {

        if ($this->validate()){
            $user = User::findOne(Yii::$app->user->identity->getId());
            $user->email = $this->email;
            $user->username = $this->username;
            $user->created_at = $time = time();
            $user->updated_at = $time;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            return $user->update();
        }



        return false;
        
    }


    public function autocomplete(){


        return User::findOne(Yii::$app->user->identity->getId());
    }
}
