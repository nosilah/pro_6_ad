<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UsersList */

$this->title = 'Update Users List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['user\update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
