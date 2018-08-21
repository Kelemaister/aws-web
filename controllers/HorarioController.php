<?php
namespace frontend\controllers;

use Yii;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\ModelEncender;
use app\models\TableHorarios;
use app\models\CreateAmi;
use app\models\FormSearch;
use app\models\newproces;
use app\models\idEliminar;
use app\models\Users;
use app\models\FormEditInstanciaHorario;
use yii\db\Query;



/**
 *  controller
 */
class HorarioController extends Controller
{
    function actionInserthorario()
    {
        if (!Yii::$app->user->isGuest) {
            $model=new ModelEncender;
             
            if($model->load(Yii::$app->request->post()))
            {
                
                if($model->validate())
                {   
                    $table = new TableHorarios;
                    $table->tipo=$model->tipo;
                    $table->frecuencia=$model->frecuencia;
                    $table->diasemana=$model->dia;
                    $table->region=$model->region;
                    $table->instance_id=$model->instance;
                    $table->encender=$model->encender;
                    $table->apagar=$model->apagar;
                    $table->servidor_procesos=$model->servidor;
                    $table->estatus=$model->estatus;
                    if ($table->insert())
                    {
                    echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("horario/instanciasprogramadas")."'>"; 
                    }
                    else
                    {
                        $msg = "Ha ocurrido un error al insertar el registro";
                    }
                }
                else
                {             
                    echo 'no se resive dato';
                    echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/view")."'>"; 
                    $model->getErrors();    
                }
                echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("horario/view")."'>";  
            }
            echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("horario/instanciasprogramadas")."'>"; 
        }    
    }
    
    function actionCreateami()
    {
        
        if (!Yii::$app->user->isGuest) {
            $model=new CreateAmi;
             
             if($model->load(Yii::$app->request->post()))
        {       
                
                
            if($model->validate())
            {
                $table = new TableHorarios;
                $table->tipo=$model->tipo;
                $table->frecuencia=$model->frecuencia;
                $table->diasemana=$model->dia;
                $table->dia_mes=$model->diaMes;
                $table->hora=$model->hora;
                $table->region=$model->region;
                $table->region_destino=$model->region_destino;
                $table->instance_id=$model->instance;
                $table->encender=$model->encender;
                $table->apagar=$model->apagar;
                $table->servidor_procesos=$model->servidor;
                $table->estatus=$model->estatus;
                if ($table->insert())
                {
                    
                echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/view")."'>"; 
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
             
            echo 'no se resive dato';
            
                $model->getErrors();
                
            }
        }
         echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("horario/creaciondeamis")."'>"; 
    
            }
            
    }
    
    function actionRespaldavolumen()
    {
        
        if (!Yii::$app->user->isGuest) {
            $model=new CreateAmi;
             
             if($model->load(Yii::$app->request->post()))
        {       
                
                
            if($model->validate())
            {
                $table = new TableHorarios;
                $table->tipo=$model->tipo;
                $table->frecuencia=$model->frecuencia;
                $table->diasemana=$model->dia;
                $table->dia_mes=$model->diaMes;
                $table->hora=$model->hora;
                $table->region=$model->region;
                $table->region_destino=$model->region_destino;
                $table->instance_id=$model->instance;
                $table->encender=$model->encender;
                $table->apagar=$model->apagar;
                $table->servidor_procesos=$model->servidor;
                $table->estatus=$model->estatus;
                if ($table->insert())
                {
                    
                echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/view")."'>"; 
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
             
            echo 'no se resive dato';
            
                $model->getErrors();
                
            }
        }
        
    
            }
            
    }
    function actionInstanciasprogramadas()
    {
        if (!Yii::$app->user->isGuest) {
            $form = new FormSearch;
            $iddelete=new idEliminar;
            $formEditInstaProgram = new FormEditInstanciaHorario;

            $search = null;
            if($form->load(Yii::$app->request->get()))
            {
                if ($form->validate())
                {
                    $query = new Query;
                    $query->select(['id','tipo', 'frecuencia', 'diasemana', 'dia_mes', 'hora', 'horarios.region', 'region_destino', 'horarios.instance_id', 'volume_id',
                        'encender', 'apagar','instance_reboot', 'servidor_procesos', 'horarios.estatus', 'instancia.tag_name'])
                    ->from('horarios')
                    ->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
                    ->orWhere(['like', "instancia.tag_name", $form->q])
                    ->orWhere(["horarios.instance_id" => $form->q])
                    ->andWhere(['horarios.tipo' => 'ENCENDIDO']);
                    $command = $query->createCommand();
                    $table = $command->queryAll();

                    $pages = new Pagination([
                        "pageSize" => 11,
                        "totalCount" =>count($table)
                    ]);
                    $query2 = new Query;
                    $query2 = $query
                    ->offset($pages->offset)
                    ->limit($pages->limit);
                    $command2 = $query2->createCommand();
                    $model = $command2->queryAll();

                    $coun=count($table);
                }
                else
                {
                    $form->getErrors();
                }
            }
            else
            {
                $query = new Query;
                $query->select(['id','tipo', 'frecuencia', 'diasemana', 'dia_mes', 'hora', 'horarios.region', 'region_destino', 'horarios.instance_id', 'volume_id',
                    'encender', 'apagar','instance_reboot', 'servidor_procesos', 'horarios.estatus', 'instancia.tag_name'])
                ->from('horarios')
                ->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
                ->where(['horarios.tipo' => 'ENCENDIDO']);
                $command = $query->createCommand();
                $table = $command->queryAll();

                $pages =new Pagination(["pageSize" => 11, "totalCount" =>count($table)]);

                $query2 = new Query;
                $query2 = $query
                ->offset($pages->offset)
                ->limit($pages->limit);
                $command2 = $query2->createCommand();
                $model = $command2->queryAll();
        
                $coun=count($table);
            }
            return $this->render("instanciasprogramadas", [
                "model" => $model,
                "form" => $form,
                "search" => $search,
                "pages" => $pages,
                "total"=>$coun,
                "delete"=>$iddelete,
                "actualizar" => $formEditInstaProgram,
                "buscador"=> $form->q,
                "modulo"=>1]);
            $this->actionExcel($model);
        }
        else
        {
            $this->goHome();
        }
    }
    
    function actionCreaciondeamis()
    {
        if (!Yii::$app->user->isGuest) {
          
                $form = new FormSearch;
                $delete=new idEliminar;
                $editar = new FormEditInstanciaHorario;
        $search = null;
        if($form->load(Yii::$app->request->get()))
        {
            if ($form->validate())
            {
                $query = new Query;
                $query->select(['id','tipo', 'frecuencia', 'diasemana', 'dia_mes', 'hora', 'horarios.region', 'region_destino', 'horarios.instance_id', 'volume_id',
                    'encender', 'apagar','instance_reboot', 'servidor_procesos', 'horarios.estatus', 'instancia.tag_name'])
                ->from('horarios')
                ->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
                ->orWhere(['like', "instancia.tag_name", $form->q])
                ->orWhere(["horarios.instance_id" => $form->q])
                ->andWhere(['horarios.tipo' => 'CREATE_AMI']);
                $command = $query->createCommand();
                $table = $command->queryAll();

                $pages = new Pagination([
                    "pageSize" => 11,
                    "totalCount" =>count($table)
                ]);
                $query2 = new Query;
                $query2 = $query
                ->offset($pages->offset)
                ->limit($pages->limit);
                $command2 = $query2->createCommand();
                $model = $command2->queryAll();

                $coun=count($table);
            }
            else
            {
                $form->getErrors();
            }
        }
        else
        {
         $query = new Query;
        $query->select(['id','tipo', 'frecuencia', 'diasemana', 'dia_mes', 'hora', 'horarios.region', 'region_destino', 'horarios.instance_id', 'volume_id',
            'encender', 'apagar','instance_reboot', 'servidor_procesos', 'horarios.estatus', 'instancia.tag_name'])
            ->from('horarios')
            ->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
            ->where(['horarios.tipo' => 'CREATE_AMI']);
            $command = $query->createCommand();
            $table = $command->queryAll();

            $pages =new Pagination(["pageSize" => 11, "totalCount" =>count($table)]);

            $query2 = new Query;
            $query2 = $query
            ->offset($pages->offset)
            ->limit($pages->limit);
            $command2 = $query2->createCommand();
            $model = $command2->queryAll();
    
            $coun=count($table);
        }
        return $this->render("createami", [
            "model" => $model,
            "form" => $form,
            "search" => $search,
            "pages" => $pages,
            "total"=>$coun,
            "delete"=>$delete,
            "actualizar"=>$editar,
            "buscador"=> $form->q,
            "modulo"=>2]);
    }
         else
         {
          $this->goHome();
         }  
       
    }
    function actionOtrosprocesos()
    {
        if (!Yii::$app->user->isGuest) {
            $model1=new newproces();
            $tipo= TableHorarios::find()->all();
            $form = new FormSearch;
            $delete=new idEliminar;
            $editar = new FormEditInstanciaHorario; 

            $frecuencia = [ 'CADAHORA'=> 'CADAHORA',
                'DIARIO'=> 'DIARIO',
                'SEMANAL'=>'SEMANAL',
                'MENSUAL'=>'MENSUAL'
            ];
            $dia = ['Lunes'=>'Lunes',
                'Martes'=>'Martes',
                'Miercoles'=>'Miercoles',
                'Jueves'=>'Jueves',
                'Viernes'=>'Viernes',
                'Sabado'=>'Sabado',
                'Domingo'=>'Domingo'
            ];
            $estatus=['X'=>'X', 'A'=>'A'];

            $search = null;

            if($form->load(Yii::$app->request->get()))
            {
                if ($form->validate())
                {
                    $query = new Query;
                    $query->select(['id','tipo', 'frecuencia', 'diasemana', 'dia_mes', 'hora', 'horarios.region', 'region_destino', 'horarios.instance_id', 'volume_id',
                        'encender', 'apagar','instance_reboot', 'servidor_procesos', 'horarios.estatus', 'instancia.tag_name'])
                        ->from('horarios')
                        ->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
                        ->orWhere(['like', "instancia.tag_name", $form->q])
                        ->orWhere(["horarios.instance_id" => $form->q]);
                    $command = $query->createCommand();
                    $table = $command->queryAll();

                    $pages = new Pagination([
                        "pageSize" => 11,
                        "totalCount" =>count($table)
                    ]);
                    $query2 = new Query;
                    $query2 = $query
                    ->offset($pages->offset)
                    ->limit($pages->limit);
                    $command2 = $query2->createCommand();
                    $table2 = $command2->queryAll();

                    $coun=count($table);
                }
                else
                {
                    $form->getErrors();
                }
            }
            else
            {
                $query = new Query;
                $query->select(['id','tipo', 'frecuencia', 'diasemana', 'dia_mes', 'hora', 'horarios.region', 'region_destino', 'horarios.instance_id', 'volume_id',
                'encender', 'apagar','instance_reboot', 'servidor_procesos', 'horarios.estatus', 'instancia.tag_name'])
                ->from('horarios')
                ->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id');
                $command = $query->createCommand();
                $table = $command->queryAll();

                $pages =new Pagination(["pageSize" => 11, "totalCount" =>count($table)]);

                $query2 = new Query;
                    $query2 = $query
                    ->offset($pages->offset)
                    ->limit($pages->limit);
                    $command2 = $query2->createCommand();
                    $table2 = $command2->queryAll();

                
                $coun=count($table);
            }

            return $this->render("otrosprocesos", ["model" => $table2,
                "form" => $form, "search" => $search,
                "createami"=>$model1,
                'frecuencia'=>$frecuencia,
                'dia'=>$dia,
                'estatus'=>$estatus,
                'tipo'=>$tipo,
                "pages" => $pages,
                "total"=>$coun,"delete"=>$delete,
                "actualizar" => $editar,
                "buscador"=> $form->q,
                "modulo"=>3]);
        }
        else
        {
            $this->goHome();
        }  
    }

    function actionNewproces()
    {
       
        
        if (!Yii::$app->user->isGuest) {
            $model=new newproces();
              $frecuencia = [ 'CADAHORA'=> 'CADAHORA',
                      'DIARIO'=> 'DIARIO',
                      'SEMANAL'=>'SEMANAL',
                      'MENSUAL'=>'MENSUAL'
                    ];
             $dia = ['Lunes'=>'Lunes',
                     'Martes'=>'Martes',
                     'Miercoles'=>'Miercoles',
                     'Jueves'=>'Jueves',
                     'Viernes'=>'Viernes',
                     'Sabado'=>'Sabado',
                     'Domingo'=>'Domingo'
                    ];
             $estatus=['X'=>'X',
                       'A'=>'A'
                      ];
             $tipo= TableHorarios::find()
                     ->all();
            
             
             if($model->load(Yii::$app->request->post()))
        {       
                
                
            if($model->validate())
            {
                $table = new TableHorarios;
                $table->tipo=$model->tipo;
                $table->frecuencia=$model->frecuencia;
                $table->diasemana=$model->dia;
                $table->dia_mes=$model->diaMes;
                $table->hora=$model->hora;
                $table->region=$model->region;
                $table->region_destino=$model->region_destino;
                $table->instance_id=$model->instance;
                $table->volume_id=$model->volumen;
                $table->encender=$model->encender;
                $table->apagar=$model->apagar;
                $table->instance_reboot=$model->instance_reboot;
                $table->servidor_procesos=$model->servidor;
                $table->estatus=$model->estatus;
                if ($table->insert())
                {
                    
                echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("horario/otrosprocesos")."'>"; 
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                   
                }
            }
            else
            {
             
            echo 'no se resive dato';
            
                $model->getErrors();
                
            }
        }
        
            echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("horario/otrosprocesos")."'>"; 
            }
                                
    else
    {
        $this->goHome();
    }
            
            
    } 
    
    
    /*function actionEliminarusuario()
    {
         if (!Yii::$app->user->isGuest) {
          
                $form = new idEliminar; 
               
        
        if($form->load(Yii::$app->request->post()))
        {
            if ($form->validate())
            {
               
            $id=$form->id;
           $table = Users::deleteAll(['id'=>$id]);
           echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/users")."'>"; 
            }
            else
            {
                $form->getErrors();
            }
        }
        else
        {
         echo "nooo se puede eliminar redireccionando....";
         echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/users")."'>"; 
        }
        echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/users")."'>"; 
    
          }
         else
         {
          $this->goHome();
         } 
        }*/ 
       
    function actionEditarinstanciaprogramada(){
      if (!Yii::$app->user->isGuest) {
        $form = new FormEditInstanciaHorario;
        if ($form->load(Yii::$app->request->post())) {
          if($form->validate()){
            $table = TableHorarios::findOne($form->id);
            $table->diasemana = $form->dia;
            $table->encender = $form->horaEncender;
            $table->apagar = $form->horaApagar;
            $table->estatus = $form->status;
            $table->update();
          }else{
            $form->getErrors();
          }
        }
        $this->redirect($form->url);
      }
    }
    
    function actionEditarinstanciacreacionamis(){
      if (!Yii::$app->user->isGuest) {
        $form = new FormEditInstanciaHorario;
        if ($form->load(Yii::$app->request->post())) {
          if($form->validate()){
            $table = TableHorarios::findOne($form->id);
            $table->diasemana = $form->dia;
            $table->encender = $form->horaEncender;
            $table->apagar = $form->horaApagar;
            $table->estatus = $form->status;
            $table->update();
          }else{
            $form->getErrors();
          }
        }
        $this->redirect($form->url);
      }
    }

    function actionEditarinstanciatodosprocesos(){
      if (!Yii::$app->user->isGuest) {
        $form = new FormEditInstanciaHorario;
        if ($form->load(Yii::$app->request->post())) {
          if($form->validate()){
            $table = TableHorarios::findOne($form->id);
            $table->diasemana = $form->dia;
            $table->encender = $form->horaEncender;
            $table->apagar = $form->horaApagar;
            $table->estatus = $form->status;
            $table->update();
          }else{
            $form->getErrors();
          }
        }
        $this->redirect($form->url);
      }
    }
    
    function actionEliminarprogramacion()
    {
        if (!Yii::$app->user->isGuest) {
            $form = new idEliminar;
            if($form->load(Yii::$app->request->post()))
            {
                if ($form->validate())
                {
                    $id=$form->id;
                    $table = TableHorarios::deleteAll(['id'=>$id]);
                    $this->redirect($form->url);
                }
                else
                {
                    $form->getErrors();
                }
            }
            else
            {
             echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("horario/otrosprocesos")."'>"; 
            }
            echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("horario/otrosprocesos")."'>"; 
        }
        else
        {
            $this->goHome();
        }          
    }

    function actionExcel($model){
        if (isset($_GET['dato'])) {
            return $this->redirect('web/index.php');
                //print_r("hola");
            }
        /*$content = $this->renderPartial('otrosprocesos', ['model'=>$model]);
        $query = new Query;
            $reporte = $query->select(['id','tipo', 'frecuencia', 'diasemana', 'dia_mes', 'hora', 'horarios.region', 'region_destino', 'horarios.instance_id', 'volume_id',
                'encender', 'apagar','instance_reboot', 'servidor_procesos', 'horarios.estatus', 'instancia.tag_name'])
            ->from('horarios');
        if (isset($_GET['modulo']) == 1) {
            if (isset($_GET['dato']) != "") {
                $reporte->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
                ->orWhere(['like', "instancia.tag_name", $_GET['dato']])
                ->orWhere(["horarios.instance_id" => $_GET['dato']])
                ->where(['horarios.tipo' => 'ENCENDIDO']);
            }else{
                $reporte->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
                ->where(['horarios.tipo' => 'ENCENDIDO']);
            }
        }
        if (isset($_GET['modulo']) == 2) {
            if (isset($_GET['dato']) != "") {
                $reporte->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
                ->orWhere(['like', "instancia.tag_name", $_GET['dato']])
                ->orWhere(["horarios.instance_id" => $_GET['dato']])
                ->where(['horarios.tipo' => 'CREATE_AMI']);
            }else{
                $reporte->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
                ->where(['horarios.tipo' => 'CREATE_AMI']);
            }
        }
        if (isset($_GET['modulo']) == 3) {
            if (isset($_GET['dato']) != "") {
                $reporte->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id')
                ->orWhere(['like', "instancia.tag_name", $_GET['dato']])
                ->orWhere(["horarios.instance_id" => $_GET['dato']]);
            }
            $reporte->innerJoin('instancia', 'horarios.instance_id = instancia.instance_id');
        }
        return Yii::$app->response->sendFile("ReporteHorarios.xls", $reporte);*/
    }
}