<?php

namespace frontend\controllers;

use Yii;
use app\models\VolumenesActivosVw;
use app\models\SearchVolumenesActivosVw;
use app\models\Horarios;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

class VolumenesActivosVwController extends \yii\web\Controller
{
    public function actionIndex()
    {
      $searchModel = new SearchVolumenesActivosVw();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


      return $this->render('index',[
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
      ]);
    }

    public function actionView($volume_id)
    {
        $request = Yii::$app->request;
        $model=VolumenesActivosVw::find()->where(['volume_id'=>$volume_id])->all();
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Volumen ID #".$volume_id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model[0],
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
                ];
        }else{
            return $this->render('view', [
                'model' => $model[0],
            ]);
        }
    }

}
