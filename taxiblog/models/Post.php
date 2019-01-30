<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Post extends \yii\db\ActiveRecord
{
    public $title;
    public $body;
    public $user_id;

    public static function tableName() {
        return 'posts';
    }

    public function rules() {
        return [
            [['body', 'user_id'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'title',
            'body' => 'body',
            'user_id' => 'user_id',
        ];
    }
}
