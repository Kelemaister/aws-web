<?php

namespace frontend\controllers;

use Yii;
use app\models\HorariosVolumenVw;
use app\models\SearchHorariosVolumenVw;
use app\models\Horarios;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;


class HorariosVolumenVwController extends Controller
{
  /*///////////////////prueba*/
  public function behaviors()
  {
      return [
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['post'],
                  'bulk-delete' => ['post'],
              ],
          ],
      ];
  }

  /*//////////////////////////////////////////////////*/


    public function actionIndex()
    {
        $searchModel = new SearchHorariosVolumenVw();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
      }

      /*///////////////////////////////////////*/

      public function actionView($id)
      {
          $request = Yii::$app->request;
          //$model=Horarios::find()->where(['id'=>$id])->all();
          if($request->isAjax){
              Yii::$app->response->format = Response::FORMAT_JSON;
              return [
                      'title'=> "Volumen #".$id,
                      'content'=>$this->renderAjax('../horarios/view', [
                          'model' => $this->findModel($id),
                      ]),
                      'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                              Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                  ];
          }else{
              return $this->render('../horarios/view', [
                  'model' => $this->findModel($id),
              ]);
          }
      }

      public function actionUpdate($id)
      {
          $request = Yii::$app->request;
          $model = $this->findModel($id);

          if($request->isAjax){
              /*
              *   Process for ajax request
              */
              Yii::$app->response->format = Response::FORMAT_JSON;
              if($request->isGet){
                  return [
                      'title'=> "Update Volumen #".$id,
                      'content'=>$this->renderAjax('../horarios/update', [
                          'model' => $model,
                      ]),
                      'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                  Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                  ];
              }else if($model->load($request->post()) && $model->save()){
                  return [
                      'forceReload'=>'#crud-datatable-pjax',
                      'title'=> "Horarios #".$id,
                      'content'=>$this->renderAjax('../horarios/view', [
                          'model' => $model,
                      ]),
                      'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                              Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                  ];
              }else{
                   return [
                      'title'=> "Update Voluem #".$id,
                      'content'=>$this->renderAjax('../horarios/update', [
                          'model' => $model,
                      ]),
                      'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                  Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                  ];
              }
          }else{
              /*
              *   Process for non-ajax request
              */
              if ($model->load($request->post()) && $model->save()) {
                  return $this->redirect(['../horarios/view', 'id' => $model->id]);
              } else {
                  return $this->render('../horarios/update', [
                      'model' => $model,
                  ]);
              }
          }
      }

      /**
       * Finds the Horarios model based on its primary key value.
       * If the model is not found, a 404 HTTP exception will be thrown.
       * @param integer $id
       * @return Horarios the loaded model
       * @throws NotFoundHttpException if the model cannot be found
       */
      protected function findModel($id)
      {
          if (($model = Horarios::findOne($id)) !== null) {
              return $model;
          } else {
              throw new NotFoundHttpException('The requested page does not exist.');
          }
      }
  }
