<?php

namespace frontend\controllers;

use frontend\controllers\behaviors\AccessBehavior;
use frontend\models\forms\LoginForm;
use frontend\models\forms\SignupForm;
use frontend\models\User;
use Yii;
use yii\filters\VerbFilter;





class UserController extends \yii\web\Controller
{

  /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'logout' => ['post'],
    //             ],
    //         ],
    //         AccessBehavior::className(),
    //     ];
    // }

    

    public function actionLogin()
    {
        $model = new LoginForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/index']);
        }
        
        return $this->render('login', [
            'model' => $model
        ]);
    }


    public function actionSignup()
    {

        
        $model = new SignupForm();
 

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'User registered');
        }


        return $this->render('signup', [
            'model' => $model,
        ]);
    }



    public function actionLogout(){

        Yii::$app->user->logout();

        return $this->redirect(['user/login']);
    }

    public function actionProfile(){

        // $this->checkAccess();



        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        }
        $model = new User();

        

        return $this->render('profile', [
            'model' => $model->findModel(),
        ]);
    }

    public function actionUpdate(){

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        }
        
        $model = new SignupForm();

        if($model->load(Yii::$app->request->post()) && $model->update()){
            Yii::$app->session->setFlash('success', 'user updated');
        }

        // $model = new User();
       $userInfo = $model->autocomplete();

        return $this->render('update', [
            'model' => $model,
            'userInfo' => $userInfo,
        ]);
    }

}
