<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Comment extends \yii\db\ActiveRecord
{
    public $body;

    public static function tableName() {
        return 'comments';
    }

    public function rules() {
        return [
            [['body'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'body' => 'body',
        ];
    }
}
