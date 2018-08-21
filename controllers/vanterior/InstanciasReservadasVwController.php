<?php

namespace frontend\controllers;


use Yii;
use app\models\InstanciasReservadasVw;
use app\models\SearchInstanciasReservadasVw;
use app\models\Horarios;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;


class InstanciasReservadasVwController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new SearchInstanciasReservadasVw();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',[
          'searchModel' =>$searchModel,
          'dataProvider' =>$dataProvider,
        ]);
    }

    public function actionView($instance_id)
    {
        $request = Yii::$app->request;
        $model=InstanciasReservadasVw::find()->where(['instance_id'=>$instance_id])->all();
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Instance Reservadas #".$instance_id,
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
