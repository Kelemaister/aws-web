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
use app\models\Instancias;
use app\models\Amis;
use app\models\AmiOregon;
use yii\data\Pagination;
use mPDF;
use app\models\FormRegister;
use app\models\Users;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\FormSearch;
use app\models\FormSearchDate;
use app\models\AmisnoOregon;
use app\models\Amisdeldia;
use app\models\Aminocreadas;

date_default_timezone_set('America/Cancun');
/**
 *  controller
 */
class AmisallController extends Controller
{
    /**
     * @inheritdoc
     */
        
    public function actionAminocreadas(){
        
        if (!Yii::$app->user->isGuest) 
        {
            $form=new FormSearch;
            $form1=new FormSearchDate;
            $search = null;
                
            if($form->load(Yii::$app->request->get())||$form1->load(Yii::$app->request->get()))
            {
                if ($form->validate())
                {
                    $search = Html::encode($form->q);
                    $value=$grupo=Yii::$app->user->identity->grupo;
                    $table = Aminocreadas::find()
                        ->where(["tag_name"=>$search])
                        ->orWhere(["instance_id"=>$search])
                        ->orWhere(["tag_department"=>$search]);
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 15,
                        "totalCount" => $count->count()]);
                    $model = $table
                        ->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
                    $coun=$table->count();
                }
                if ($form1->validate())
                {
                    $dsearch = Html::encode($form1->date_1);
                    $table = Aminocreadas::find()
                        ->where(["like","last_update",$dsearch]);
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 15,
                        "totalCount" => $count->count()]);
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
                $grupo=Yii::$app->user->identity->grupo;
                $fecha=date('Y-m-d');
                $table = Aminocreadas::find()
                    ->where(['like','last_update',$fecha]);
                $count = clone $table;
                $pages =new Pagination([
                    "pageSize" => 10,
                    "totalCount" =>$count->count()]);
                $model = $table 
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();
                $coun=$table->count();
            }
            return $this->render("aminocreadas",["model" => $model,"pages" =>$pages,"total"=>$coun,"form"=>$form,"form1"=>$form1]);
        }
        else
        {
            $this->goHome();
        }
    }
    
    public function actionAmisdeldia()
    {
        if (!Yii::$app->user->isGuest) {
            $form=new FormSearch;
            $form1=new FormSearchDate;
            $fecha=date('Y-m-d');
            $hora=date('g:i A');
            $date=$fecha." ".$hora;
            $search=null;
            $buscaFecha=null;
            if($form->load(Yii::$app->request->get()))
            {
           
                if ($form->validate())
                {
                    $search = Html::encode($form->q);
                    $value=$grupo=Yii::$app->user->identity->grupo;
                    $table = Amisdeldia::find()
                        ->where(['like', "tag_name", $search])
                        ->orWhere(["image_id"=>$search])
                        ->orWhere(["instance_id"=>$search])
                        ->orWhere(["nombre"=>$search])
                        ->andWhere(["like","fecha_ami",$fecha]);                
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 15,
                        "totalCount" => $count->count()]);
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
                $grupo=Yii::$app->user->identity->grupo;
                $table = Amisdeldia::find()
                    ->where(["like","fecha_ami",$fecha]);
                $count = clone $table;
                $pages =new Pagination([
                    "pageSize" => 10,
                    "totalCount" =>$count->count()]);
                $model = $table                        
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();
                $coun=$table->count();
            }
            return $this->render("amisdeldia",["model" => $model,"pages" =>$pages,"total"=>$coun,"form"=>$form,"form1"=>$form1]);
        }
        else
        {
            $this->goHome();
        }
    }

    
    public function actionAmis(){
        
        if (!Yii::$app->user->isGuest) {
            $region='Virginia';
            $form = new FormSearch;
            $form1 = new FormSearchDate;
            //$sistema=strftime( "%Y-%m", time());
            //$actual=$sistema."-01";
            $search = null;
            if($form->load(Yii::$app->request->get())||$form1->load(Yii::$app->request->get()))
            {
                if ($form->validate())
                {
                    $search = Html::encode($form->q);
                    $table = Amis::find()
                        ->where(["nombre"=>$search])
                        ->orWhere(["image_id"=>$search])
                        ->orWhere(["tag_department"=>$search])
                        ->orWhere(["instance_id"=>$search])
                        ->orWhere(["like", "descripcion",$search]);
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 7,
                        "totalCount" => $count->count()]);
                    $model = $table
                        ->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
                    $coun=$table->count();
                }

                if ($form1->validate())
                {
                    $date = Html::encode($form1->date_1);
                    $table = Amis::find()
                            ->where(['like',"fecha",$date])
                            ->andWhere(["estatus"=>"Creado"]);
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 7,
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
                //$sistema=strftime("%Y-%m", time());
                $grupo=Yii::$app->user->identity->grupo;
                $table = Amis::find()
                    ->where(["estatus"=>"creado"]);
                $count = clone $table;
                $pages =new Pagination([
                    "pageSize" => 7,
                    "totalCount" =>$count->count()]);
                $model = $table 
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();
                $coun=$table->count();
            }
            return $this->render("amis", ["model" => $model, "form" => $form, "search" => $search, "pages" => $pages,"total"=>$coun,"region"=>$region,"form1"=>$form1]);
        }
        else
        {
            $this->goHome();
        }
    }
    
     public function actionAmioregon(){
        
        if (!Yii::$app->user->isGuest) {
            $region='Oregon';
            $form = new FormSearch;
            $form1 = new FormSearchDate;
            $search = null;

            if($form->load(Yii::$app->request->get())||$form1->load(Yii::$app->request->get()))
            {
                if ($form->validate())
                {
                    $search = Html::encode($form->q);
                    $table = AmiOregon::find()
                            ->where(["like","image_id",$search])
                            ->orWhere(["instance_id"=>$search])
                            ->orWhere(["like", "descripcion",$search]);
                    
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 9,
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
                    $searchFecha = Html::encode($form1->date_1);
                     
                    $fechainput=$searchFecha;
                     
                    list($año, $mes, $dia) = preg_split("/[-.]/", $fechainput);
                    $dateUnfique="".$año."".$mes."".$dia;
                    
                    $table = AmiOregon::find()
                           ->where(["like","descripcion",$dateUnfique])
                            ->orWhere(["like","fecha",$searchFecha]);
                    
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 9,
                        "totalCount" => $count->count()]);
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
                $sistema=strftime( "%Y-%m", time());
                $fechsis=$sistema."-01";
                
                list($año, $mes, $dia) = explode('-', $fechsis);  // Cambio de "split" a "explode" y '[/.-]' a - debido a offset: 1 (no contenia '/' ó '.')
                $dateSistem="".$año."".$mes."".$dia;
                //echo $dateSistem;
                     
                $table = AmiOregon::find()
                    ->where(["estatus"=>'creado']);
                    $count = clone $table;
                $pages =new Pagination([
                    "pageSize" => 9,
                    "totalCount" =>$count->count()]);
                $model = $table 
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();

                $coun=$table->count();
            }
            return $this->render("amioregon", ["model" => $model, "form" => $form, "search" => $search, "pages" => $pages,"total"=>$coun,"region"=>$region,"form1"=>$form1]);
        }
         else
         {
          $this->goHome();
         }
     
     
     }
     
    public function actionAminooregon(){
        if (!Yii::$app->user->isGuest) {
            $region='Oregon';
            $form = new FormSearch;
            $form1 = new FormSearchDate;
            $sistema=strftime( "%Y-%m", time());
            $actual=$sistema."-01";
            $search = null;
            $date=null;

            if($form->load(Yii::$app->request->get())||$form1->load(Yii::$app->request->get()))
            {
                if ($form->validate())
                {
                    $search = Html::encode($form->q);
                    
                    $table = AmisnoOregon::find()
                            ->where(["nombre"=>$search])
                            ->orWhere(["image_id"=>$search])
                            ->orWhere(["tag_department"=>$search])
                            ->orWhere(["instance_id"=>$search])
                            ->orWhere(["like", "descripcion",$search])
                            ->andWhere(["estatus"=>"creado"])
                            ;
                    
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 7,
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
                
                    $date = Html::encode($form1->date_1);
                
                    $table = AmisnoOregon::find()
                        ->where(['like',"fecha",$date])
                        ->andWhere(["estatus"=>"Creado"]);
                
                    $count = clone $table;
                    $pages = new Pagination([
                        "pageSize" => 7,
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
            $sistema=strftime( "%Y-%m", time());
            $grupo=Yii::$app->user->identity->grupo;
            $table = AmisnoOregon::find()
                ->where(["estatus"=>"creado"]);
         
            $count = clone $table;
            $pages =new Pagination([
                "pageSize" => 7,
                "totalCount" =>$count->count()
            ]);
            $model = $table 
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
                
            $coun=$table->count();
        }
        return $this->render("amisnooregon", ["model" => $model, "form" => $form, "search" => $search, "pages" => $pages,"total"=>$coun,"region"=>$region,"form1"=>$form1]);
       
        }
        else
        {
            $this->goHome();
        }
    }
        
        
       
        
}