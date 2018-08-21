<?php

namespace frontend\controllers;

use Yii;
use app\models\SnapshotsActivosVw;
use app\models\SearchSnapshotsActivosVw;
use app\models\Horarios;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

class SnapshotsActivosVwController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new SearchSnapshotsActivosVw();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index',[
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($snapshot_id)
    {
        $request = Yii::$app->request;
        $model=SnapshotsActivosVw::find()->where(['snapshot_id'=>$snapshot_id])->all();
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Snapshot ID #".$snapshot_id,
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
