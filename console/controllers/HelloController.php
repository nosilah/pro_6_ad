<?php

namespace console\controllers;

use yii\console\Controller;
use frontend\models\UsersList;

class HelloController extends Controller
{
    // public $message;
    
    // public function options($actionID)
    // {
    //     return ['message'];
    // }
    
    // public function optionAliases()
    // {
    //     return ['m' => 'message'];
    // }
    
    public function actionIndex()
    {

        echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, eligendi nulla. Nobis rem nam consequatur quia tempore distinctio dolores similique consequuntur autem, cum sed aspernatur sunt animi dicta recusandae obcaecati.';
        // echo $this->message . "\n";
    }

    public function actionTest(){

    
        $model = new UsersList();


        $users = $model->find()->asArray()->all();

        print_r($users);


    }


    
}