<?php

namespace frontend\controllers;

use Yii;
use app\models\HorariosGeneralVw;
use app\models\SearchHorariosGeneralVw;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

class HorariosGeneralVwController extends \yii\web\Controller
{
    public function actionIndex()
    {
      $searchModel = new SearchHorariosGeneralVw();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

}
