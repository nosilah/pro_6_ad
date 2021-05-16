<?php

namespace frontend\models;

use yii\db\ActiveRecord;


class UsersList extends ActiveRecord
{

    public static function tableName()
    {
        return 'user';
    }


    

}