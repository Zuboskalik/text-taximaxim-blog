<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comment-view">

    <h1><?= Html::encode('Комментарий к посту "'.$model->post->title.'"') ?></h1>

    <p>
        <?= Html::a('Оригинальный пост', ['/post/view', 'id' => $model->post->id], ['class' => 'btn btn-primary']) ?>

        <?php
        $user = User::FindOne(['id' => Yii::$app->user->id]);
        if (!Yii::$app->user->isGuest && $user->role_id==1) { ?>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>
    </p>

    <?php
      $model['post_id'] = $model->post->title;
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'post_id',
            'body:ntext',
            'created_at'
        ],
    ]) ?>

</div>
