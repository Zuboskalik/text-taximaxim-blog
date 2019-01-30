<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Comment;

class CommentController extends Controller
{
    public function actionView($id)
    {
      $model = Comment::findOne($id);
      if ($model === null) {
          throw new NotFoundHttpException;
      }

      return $this->render('view', [
          'model' => $model,
      ]);
    }

    public function actionCreate()
    {
      $model = new Comment;

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['view', 'id' => $model->id]);
      } else {
          return $this->render('create', [
              'model' => $model,
          ]);
      }
    }
}
