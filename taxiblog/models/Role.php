<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Role extends \yii\db\ActiveRecord
{
    public $name;

    public static function tableName() {
        return 'roles';
    }

    public function rules() {
        return [
            [['name'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'name',
        ];
    }
}
