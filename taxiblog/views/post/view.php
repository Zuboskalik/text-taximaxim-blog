<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
      $model['user_id'] = $model->user->name;
      $model['status'] = array(2 => 'Черновик', 1 => 'Доступно для чтения', 0 =>'Скрыто')[$model['status']];
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'status',
            'title',
            'body:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <p>
      <?= Html::a('Новый комментарий', ['/comment/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    Комментарии<?= empty($model->comments) ? ' отсутствуют' : ':' ?>

    <?php foreach ($model->comments as $comment) { ?>

    <?= DetailView::widget([
        'model' => $comment,
        'attributes' => [
            'id',
            'body:ntext',
            'created_at',
        ],
    ]) ?>

    <?php } ?>

</div>
