<?php
namespace frontend\controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\Pagination;
use mPDF;
use app\models\FormRegister;
use app\models\Users;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\FormSearch;
use app\models\Snapshots;
use app\models\SnapOregon;
use app\models\FormSearchDate;

/**
 *  controller
 */
class SnapshotsController extends Controller
{
    /**
     * @inheritdoc
     */

    public function actionVirginia(){
        
        if (!Yii::$app->user->isGuest) {
            $region='Virginia';
            $form = new FormSearch;
            $form1 = new FormSearchDate;
            $search = null;
            if($form->load(Yii::$app->request->get())||$form1->load(Yii::$app->request->get()))
            {
                 if ($form->validate())
                {
                    $search = Html::encode($form->q);
                    $table = Snapshots::find()
                            ->where(["like", "snapshot_id",$search])
                            ->orWhere(["like", "image_id",$search])
                            ->orWhere(["like", "volume_id",$search])
                            ->orWhere(["like", "tag_name",$search])
                            ->orWhere(["like", "instance_id",$search])
                            ;
                    
                    
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 11,
                        "totalCount" => $count->count()
                    ]);
                    $model = $table
                            ->offset($pages->offset)
                            ->limit($pages->limit)
                            ->all();
                    $coun=$table->count();
                }
                if ($form1->validate())
                {
                    $buscafecha = Html::encode($form1->date_1);
                    $table = Snapshots::find()
                            ->where(["like", "fecha",$buscafecha])
                            ->andWhere(["estatus"=>"creado"])
                            ;
                    
                    
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 11,
                        "totalCount" => $count->count()
                    ]);
                    $model = $table
                            ->offset($pages->offset)
                            ->limit($pages->limit)
                            ->all();
                    $coun=$table->count();
                }
                else
                {
                    $form->getErrors();
                }
            }
            else
            {
                $table = Snapshots::find()
                    ->where(['estatus'=>"creado"]);
                $count = clone $table;
                $pages =new Pagination([
                    "pageSize" => 11,
                    "totalCount" =>$count->count()
                ]);
                $model = $table 
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();                
                $coun=$table->count();
            }
            return $this->render("snapshot", ["model" => $model, "form" => $form, "search" => $search, "pages" => $pages,"total"=>$coun,"region"=>$region,"fech"=>$form1]);
        }
        else
        {
            $this->goHome();
        }
    }
     
     
     
    
     public function actionOregon(){
        
            if (!Yii::$app->user->isGuest) {
                $region='Oregon';
                $form = new FormSearch;
                $form1 = new FormSearchDate;
        $search = null;
        if($form->load(Yii::$app->request->get())||$form1->load(Yii::$app->request->get()))
        {
            
            if ($form1->validate())
            {
                $dateSearch = Html::encode($form1->date_1);
                $table = SnapOregon::find()
                        ->where(["like", "fecha",$dateSearch]);
                
                
                $count = clone $table;
                $pages = new Pagination([
                    "pageSize" => 11,
                    "totalCount" => $count->count()
                ]);
                $model = $table
                        ->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
                $coun=$table->count();
            }
            if ($form->validate())
            {
                $search = Html::encode($form->q);
                $table = SnapOregon::find()
                        ->where(["like", "snapshot_id",$search])
                        ->orWhere(["like", "image_id",$search])
                        ->orWhere(["like", "volume_id",$search])
                        ->orWhere(["like", "tag_name",$search])
                        ->orWhere(["like", "instance_id",$search])
                        ;
                
                
                $count = clone $table;
                $pages = new Pagination([
                    "pageSize" => 11,
                    "totalCount" => $count->count()
                ]);
                $model = $table
                        ->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
                $coun=$table->count();
            }
            else
            {
                $form->getErrors();
            }
        }
        else
        {
         $table = SnapOregon::find()
                 ->where(['estatus'=>"creado"]);
         
                $count = clone $table;
                $pages =new Pagination([
                    "pageSize" => 11,
                    "totalCount" =>$count->count()
                ]);
                $model = $table 
                        
                        ->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
                
                $coun=$table->count();
        }
    return $this->render("snapshotoregon", ["model" => $model, "form" => $form, "search" => $search, "pages" => $pages,"total"=>$coun,"region"=>$region,"form1"=>$form1]);
       
            }
         else
         {
          $this->goHome();
         }
     }
     
            
}