<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */

$this->title = 'hello, ' . $model->username . ' in your profile';
$this->params['breadcrumbs'][] = $this->title;

// print_r($model);
?>
<div class="user-profile">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['user/update'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Id',
                'value' => $model->id
            ],
            [
                'label' => 'Username',
                'value' => $model->username
            ],
            [
                'label' => 'Email',
                'value' => $model->email
            ],
            [
                'label' => 'Password',
                'value' => '*********'
            ],
            [
                'label' => 'status',
                'value' => $model->status
            ],
        ],
    ]) ?>



</div>