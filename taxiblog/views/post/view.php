<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        $user = User::FindOne(['id' => Yii::$app->user->id]);
        if ($user->role_id == 1 || $model->user_id==$user->id) {
        ?>
          <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        }
        ?>
    </p>


    <?php
    if ($user->role_id == 1 || $model->user_id==$user->id || $model->status == 1) {

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
            'created_at'
        ],
    ]); ?>

    <p>
      <?= Html::a('Новый комментарий', ['/comment/create', 'post_id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php } else { ?>
    <?= '<p>Запись еще не опубликована автором '.$model->user->name.'</p>' ?>

    <?php
    }
    ?>



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
