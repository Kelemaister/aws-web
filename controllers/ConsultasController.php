<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\Instancias;
use app\models\Amis;
use yii\data\Pagination;

use app\models\FormRegister;
use app\models\Users;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Aws\Ec2\Ec2Client;
use Aws\Credentials\CredentialProvider;
use app\models\FormSearch;
use app\models\FormInstancia;
use app\models\Formdate;
use app\models\Programar;
use app\models\Amisdeldia;
use app\models\ConfirmarEliminacion;
use app\models\ModelEncender;
use app\models\CreateAmi;
use app\models\idEliminar;
use app\models\FormEditar;
use yii\db\Query;
use app\models\ami;
use app\models\volume;
use app\models\snapshot;
use app\models\AmiOregon;
use app\models\BackupAmiOregon;
use app\models\BackupInstancias;
use app\models\BackupSnapOregon;
use app\models\BackupVolume;
use app\models\Grupos;
use app\models\frmGrupos;
use app\models\frmEditarGrupo;
use app\models\UsuarioEditar;


date_default_timezone_set('America/Cancun');

class ConsultasController extends Controller
{
    public function actionInformacion(){
      if (!Yii::$app->user->isGuest) {
        if(Yii::$app->user->identity->grupo == "Datacenter"){

           /////Main_Virginia Instancias vs Instancias Respaldadas de Virginia//////////////////////////////////
          $instancias = Instancias::find()
          ->distinct()
          ->where("estatus = 'A'")
          ->andWhere(['not like', "tag_name", "EXCH-"])
          ->andWhere("region = 'us-east-1'");

          $amis = ami::find()
          ->select('instance_id')
          ->distinct()
          ->where("DATE(fecha) = CURDATE()")
          ->andWhere("region = 'us-east-1'");

          $totalAmi = $amis->count();


          $totalInst = $instancias->count();

          $MainInstVsRespalDiferencia = $totalAmi - $totalInst;

          /*$query = new Query; /////Consulta General para mandar los 3 datos requeridos de la tabla de "Informacion"
          $query->select(["count(distinct t2.instance_id) as Instancias", "count(distinct t1.instance_id) as AMIs", 
                          "count(distinct t1.instance_id) - count(distinct t2.instance_id) as Diferencia"])
                  ->from("ami t1")
                  ->innerJoin("instancia t2")
                  ->where("DATE(t1.fecha) = '2018-07-05' and t2.region = 'us-east-1' and t1.region = 'us-east-1' and t2.estatus = 'A'")
                  ->one();
          $command = $query->createCommand();
          $tbl = $command->queryAll();*/

          /////Main_Volumenes vs Snapshots///////////////////////////////////////////////////////////

          $volumenes = volume::find()
          ->select('volume_id')
          ->distinct()
          ->where("region = 'us-east-1'")
          ->andWhere("estatus = 'A'")
          ->andWhere(['not like', "tag_name", "EXCH-"]);

          $snapshots = snapshot::find()
          ->select('snapshot_id')
          ->distinct()
          ->where("DATE(fecha) = CURDATE()")
          ->andWhere("estatus = 'Creado'")
          ->andWhere("region = 'us-east-1'");

          $totalVolumenes = $volumenes->count();

          $totalSnapshots = $snapshots->count();

          $MainVolVsSnapDiferencia = $totalSnapshots - $totalVolumenes;

          /*$query2 = new Query; /////Consulta General para mandar los 3 datos requeridos de la tabla de "Informacion"
          $query2->select(["count(distinct t2.volume_id) as Volumenes", "count(distinct t1.snapshot_id) as Snapshots", 
                          "count(distinct t1.snapshot_id) - count(distinct t2.volume_id) as Diferencia"])
                  ->from("snapshot t1")
                  ->innerJoin("volumen t2")
                  ->where("DATE(t1.fecha) = '2018-07-05' and t1.estatus = 'Creado' and t1.region = 'us-east-1' and t2.region = 'us-east-1' and t2.estatus = 'A'")
                  ->one();
          $command2 = $query2->createCommand();
          $tbl2 = $command2->queryAll();*/

          ////Main_Oregon////////////////////////////////////////////////////////////////////////////

          $amisMainOregon_Creado = AmiOregon::find()
          ->where(['estatus' => 'Creado']);

          $amisMainOregon_HistAmis = AmiOregon::find()
          ->where(['estatus'=>'HistAmis']);

          $snapMainOregon = snapshot::find()
          ->where(['estatus'=>'Creado'])
          ->andWhere(['region'=>'us-west-2']);
          
          $totalSnaps = $snapMainOregon->count();

          $totalAmis = $amisMainOregon_Creado->count() + $amisMainOregon_HistAmis->count();

          $instancias_oregon = Instancias::find()
          ->where(['estatus'=>'A'])
          ->andWhere(['region'=>'us-west-2']);

          $total_inst_oregon = $instancias_oregon->count();

          $volumenes_oregon = volume::find()
          ->where(['estatus'=>'A'])
          ->andWhere(['region'=>'us-west-2']);

          $total_inst_oregon = $instancias_oregon->count();

          ////Backup_Oregon///////////////////////////////////////////////////////////////////////////

          $instOregonBackup = BackupInstancias::find()
          ->where(['estatus'=>'A'])
          ->andWhere(['region'=>'us-west-2']);
          $totalInstBackup = $instOregonBackup->count();

          $volumeOregonBackup = BackupVolume::find()
          ->where(['estatus'=>'A'])
          ->andWhere(['region'=>'us-west-2']);
          $totalVolumenBackup = $volumeOregonBackup->count();

          $amisBackup_Oregon_Creado = BackupAmiOregon::find()
          ->where(['estatus'=>'Creado']);
          $backupAmisCreadoOregon = $amisBackup_Oregon_Creado->count();

          $amisBackup_Oregon_HistAmis = BackupAmiOregon::find()
          ->where(['estatus'=>'HistAmis']);
          $backupAmisHistAmisOregon = $amisBackup_Oregon_HistAmis->count();
          
          $totalAmisBackup = $backupAmisCreadoOregon + $backupAmisHistAmisOregon;

          $snapsOregonBackup = BackupSnapOregon::find()
          ->where(['estatus'=>'Creado']);
          $totalSnapsBackup = $snapsOregonBackup->count();

          $BackupOregon = compact($totalInstBackup, $totalVolumenBackup, $totalAmisBackup, $totalSnapsBackup);

          echo "<meta http-equiv='Refresh' content='20 ".Url::toRoute("consultas/informacion")."'>";

          return $this->render('Informacion', ['amis'=>$totalAmi, 'inst'=>$totalInst, 'dif'=>$MainInstVsRespalDiferencia, 'mainVolumenes'=> $totalVolumenes, 'mainSnaps'=> $totalSnapshots, 'mainVolVsSnapsDiferencia'=>$MainVolVsSnapDiferencia, 'total_inst_oregon'=>$total_inst_oregon, 'totalAmis'=>$totalAmis, 'totalSnaps'=>$totalSnaps, /*'backupTotalInst'=>$totalInstBackup, 'backupTotalVolumenes'=>$totalVolumenBackup, 'backupTotalSnaps'=>$totalSnapsBackup, 'backupTotalAmis'=>$totalAmisBackup*/]);
        }
      }
    }

    public function actionInstanciasvsreservadas(){
      if (!Yii::$app->user->isGuest) {
        if(Yii::$app->user->identity->grupo == "Datacenter"){
          /////Instancias vs Instancias Reservadas///////////////////////////////////////////////

          /*$Filas = new Query;
          $Filas->select(["t1.instance_type"])
                ->from("instancia t1")
                ->leftJoin("instancia_resv t2", "t1.instance_type = t2.instance_type")
                ->where("t1.instance_state = 'running' and t1.region = 'us-east-1' and t1.estatus = 'A'
                    group by t1.instance_type
                    order by count(distinct t1.instance_id) DESC")->all();

          $command_f = $Filas->createCommand();
          $tbl_f = $command_f->queryAll();
          $totalFilas = count($tbl_f);
          $mitad_1 = round($totalFilas/2);
          $mitad_2 = $totalFilas-$mitad_1;*/

          $query3 = new Query;
          $query3->select(["t1.instance_type as Tipo_instancia", "count(distinct t1.instance_id) as No_instancias",
                "round(ifnull(sum(t2.instance_count),0)*count(distinct t2.id)/count(*)) as No_Inst_Reserv",
                "round(ifnull(sum(t2.instance_count),0)*count(distinct t2.id)/count(*) - ifnull(count(distinct t1.instance_id),0)) as Diferencia"])
                ->from("instancia t1")
                ->leftJoin("instancia_resv t2", "t1.instance_type = t2.instance_type")
                ->where("t1.instance_state = 'running' and t1.region = 'us-east-1' and t1.estatus = 'A'
                    group by t1.instance_type
                    order by count(distinct t1.instance_id) DESC")->all();

          $command3 = $query3->createCommand();
          $tbl3 = $command3->queryAll();

          /*$query4 = new Query;
          $query4->select(["t1.instance_type as Tipo_instancia", "count(distinct t1.instance_id) as No_instancias",
                "round(ifnull(sum(t2.instance_count),0)*count(distinct t2.id)/count(*)) as No_Inst_Reserv",
                "round(ifnull(sum(t2.instance_count),0)*count(distinct t2.id)/count(*) - ifnull(count(distinct t1.instance_id),0)) as Diferencia"])
                ->from("instancia t1")
                ->leftJoin("instancia_resv t2", "t1.instance_type = t2.instance_type")
                ->where("t1.instance_state = 'running' and t1.region = 'us-east-1' and t1.estatus = 'A'
                    group by t1.instance_type
                    order by count(distinct t1.instance_id) DESC limit $mitad_1, $mitad_2")->all();

          $command4 = $query4->createCommand();
          $tbl3_1 = $command4->queryAll();*/

          return $this->render('InstanciasVsReservadas', ['tbl3'=>$tbl3,]);
        }
      }
    }

    public function actionDetalleseliminacion()
    {
      if (!Yii::$app->user->isGuest) {
        $form=new FormSearch;
        $forminstan=new FormInstancia;
        $modelins=new ConfirmarEliminacion();
        $id= null;
       
        if(isset($_REQUEST['id'])&&isset($_REQUEST['nombre'])&&isset($_REQUEST['proceso']))
        {
            $estado = Html::encode($_GET['proceso']);
            $id=  Html::encode($_GET['id']);
            if($estado=='pregunta')
            {
            $table = Programar::find()
              ->where(['id'=>$id])
              ->all();
            }
            return $this->render('detalleseliminacion',["model" => $table,"form"=>$modelins]);
        }
        else
        {
          if($modelins->proceso=='eliminar')
          {

          }
        }
      }
    }
   
    public function actionProgramo() {
             
      if (!Yii::$app->user->isGuest)
      {
        $model=new Formdate;
             
          if($model->load(Yii::$app->request->post()))
          {       
            $table = new Programar;  
            if($model->validate())
            {
              $table = new Programar;
              $table->tag_name=$model->nombre;
              $table->instance_id=$model->instance;
              $table->fecha_encendido=$model->fechaon;
              $table->hora_encendido=$model->horaon;
              $table->fecha_apagado=$model->fechaoff;
              $table->hora_apagado=$model->horaoff;
              $table->estatus=1;
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
              $model->getErrors();  
            }
        }
    
    }  
  }
    
    public function actionProgramar()
    {
            
      if (!Yii::$app->user->isGuest)
      {
        //modelos para poder ser leidos en la vista
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
        //clases de los modelos para ser enviados a la vista
        $form=new FormSearch;
        $forminstan=new FormInstancia;
        $modelinsert=new Formdate;
        $mhorario=new ModelEncender;
        $createami=new CreateAmi;
        $search = null;
        $search = Html::encode($_GET['id']);
        $nombre = Html::encode($_GET['nombre']);
        $estado = Html::encode($_GET['estado']);
        $table = Instancias::find()
          ->where(['instance_id'=>$search])
          ->all();
        return $this->render('programar',["model" => $table,'in'=>$nombre,"modelito"=>$modelinsert,'id'=>$search,
          "createami"=>$createami,
          'cl'=>$forminstan,"modelhorario"=>$mhorario,
          'frecuencia'=>$frecuencia,
          'dia'=>$dia,
          'id'=>$search,
          'estatus'=>$estatus
        ]);
      }
    }

    public function actionDetalles()
    {
      if (!Yii::$app->user->isGuest)
      {          
        $form=new FormSearch;
        $forminstan=new FormInstancia;
        $ftime=new Formdate;
        $search = null;
        $search = Html::encode($_GET['id']);
        $nombre = Html::encode($_GET['nombre']);
        $table = Instancias::find()
          ->where(['instance_id'=>$search])
          ->all();
        return $this->render('detalles',["model" =>$table,'in'=>$nombre,"form"=>$forminstan]);
      }
    }
    //muestra  las instancias 
    public function actionView()
    {
        
      if (!Yii::$app->user->isGuest)
      {
        //modelos para poder ser leidos en la vista
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
         //clases de los modelos para ser enviados a la vista
        $form=new FormSearch;
        $forminstan=new FormInstancia;
        $modelinsert=new Formdate;
        $mhorario=new ModelEncender;
        $createami=new CreateAmi;
          
        if($form->load(Yii::$app->request->get()))
        {
          if ($form->validate())
          {
            $search = Html::encode($form->q);
            $value=$grupo=Yii::$app->user->identity->grupo;

            if($value=='Datacenter')
            {    
              $table = Instancias::find()
                ->where(['like',"tag_name",$search])
                ->orWhere(['like',"instance_id",$search])
                ->orWhere(['like',"region",$search])
                ->orWhere(['like',"tag_department",$search])
                ->orWhere(['like',"instance_type",$search])
                ->orWhere(['like',"instance_state",$search])
                ->andWhere(['<>','instance_state','terminated'])
                ->andWhere(['estatus'=>'A']);
            }
            else
            {
              $table = Instancias::find()
                ->where(["tag_name"=>$search])
                ->orWhere(["instance_id"=>$search])
                ->orWhere(['like',"instance_state",$search])
                ->andWhere(['like',"tag_name",$value])
                ->andWhere(['<>','instance_state','terminated'])
                ->andWhere(['estatus'=>'A']);
            }      
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
          $grupo=Yii::$app->user->identity->grupo;
          if ($grupo == "Datacenter") {
            $table = Instancias::find()
            ->where(['<>', 'instance_state', 'terminated'])
            ->andWhere(['estatus'=>'A']);
          }else{
            $table = Instancias::find()
              ->where(['like',"tag_name",$grupo])
              ->andWhere(['<>','instance_state','terminated'])
              ->andWhere(['estatus'=>'A']);
          }
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
        return $this->render("view",["model" => $model,"pages" =>$pages,
          "total"=>$coun,"form"=>$form,
          "forminstancia"=>$forminstan,
          "modelito"=>$modelinsert,
          "modelhorario"=>$mhorario,
          "createami"=>$createami,
          'frecuencia'=>$frecuencia,
          'dia'=>$dia,
          'estatus'=>$estatus]);
      }
      else
      {
        $this->goHome();
      }
    }
     
    public function credenciales()
    {
      $config = [
        'version' => '2016-11-15',
        'region' => 'us-east-1',
                 
        'credentials' => [
          'key'    =>'',
          'secret' => '',
        ],
        'http'    => [
          'verify' => false
        ]
      ];  
      $credential= Ec2Client::factory($config);
      return $credential;
    }
    
    public function actionEncender()
    {
      $form= new FormInstancia;
      $instancia= null;
      $action=null;
      if($form->load(Yii::$app->request->post()))
      {
        if ($form->validate())
        {
          $instancia = Html::encode($form->instancia);
          $credential=$this->credenciales();
          $action = $form->action;
          $instanceIds = array($instancia);
          if ($action == 'START') {
            $result = $credential->startInstances(array('InstanceIds' => $instanceIds,));
            $table= Instancias::findOne($instancia);
            if($table)
            {
              $table->instance_state='running';
              if($table->update())
              {
                $this->redirect($form->urlActual);
              }
            }
          }        
          if($action=='STOP')
          {
            $result=$credential->stopInstances(array('InstanceIds' => $instanceIds,));
            $table= Instancias::findOne($instancia);
            if($table)
            {
              $table->instance_state='stopped';
              if($table->update())
              {    
                $this->redirect($form->urlActual);
              }     
            }
          }
        }
      }
      //echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/view")."'>";    
    }
      
    //funcion para encender instancias automaticanmente
   public function actionEjecutarprogramacion()
           {
       $this->actionEjecutarprogramacionapagado();
       $credential=$this->credenciales();
           $fecha=date('Y-m-d');
           $hora=date('g:i A');
           $datos= Programar::find()
                   ->where(['fecha_encendido'=>$fecha])
                   ->andWhere(['hora_encendido'=>$hora])
                   ->andWhere(['<>','estatus','2'])
                   ->all()
                   ;
           
           if($datos<>null)
               {
                   foreach ($datos as $row)
                   {
                       
                         $instanceIds =array($row['instance_id']);
            $result = $credential->startInstances(array(
            'InstanceIds' => $instanceIds,
            ));
            $table=Instancias::findOne($instanceIds);
            
            if($table!=null)
                {
                
                $table->instance_state='running';
                if($table->update())
                {
                 
                $table2= Programar::find()
                        ->where(['instance_id'=>$row['instance_id']])
                        ->all();
                if($table2!=null){
                foreach ($table2 as $row1) {
                 
                   $row1->estatus='2'; 
                   if($row1->update())
                {
                   
                }
                }
                
                }  
                }
                
                }
                else
                {
                    echo 'no data';
                }
            
     
           }
          echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/view")."'>"; 
           
                }
        
                else
                {
                    echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/view")."'>"; 
                }
           }
           
           //funcion para apagar instancias automaticanmente
   public function actionEjecutarprogramacionapagado()
           {
       
       
       $credential=$this->credenciales();
           $fecha=date('Y-m-d');
           $hora=date('g:i A');
           
           
           $datos= Programar::find()
                   ->where(['fecha_apagado'=>$fecha])
                   ->andWhere(['hora_apagado'=>$hora])
                   ->andWhere(['<>','estatus','3'])
                   ->all()
                   ;
           
           if($datos<>null)
               {
                   foreach ($datos as $row)
                   {
                       
                         $instanceIds =array($row['instance_id']);
            $result = $credential->stopInstances(array(
            'InstanceIds' => $instanceIds,
            ));
            $table=Instancias::findOne($instanceIds);
            
            if($table!=null)
                {
                $table->instance_state='stopped';
                if($table->update())
                {
                  $table2= Programar::find()
                        ->where(['instance_id'=>$row['instance_id']])
                        ->all();
                if($table2!=null){
                foreach ($table2 as $row1) {
                 //estatus de la tabla programacion simbolo 1=insertado 2=encendido 3=apagado
                   $row1->estatus='3'; 
                   if($row1->update())
                {
                   
                }
                }
                
                }  
                }
                
                }
                else
                {
                    
                }
            
     
           }
          
           
                }
        
                else
                {
                   
                }
        
       
           }
           
      
    //funcion para mostrar usuarios
  public function actionUsers()
  {
    if (!Yii::$app->user->isGuest)
    {
      $drop = Grupos::find()->all();

      $form=new idEliminar;
      $search=new FormSearch;
      $register=new FormRegister;
      $editar = new FormEditar;
      $infoUsu = new UsuarioEditar;
             
      if($search->load(Yii::$app->request->get()))
      {
        if ($search->validate())
        {
          $busca = Html::encode($search->q);
          $table = Users::find()
            ->where(["like","username",$busca]);
          $count = clone $table;
          $pages = new Pagination([
            "pageSize" => 15,
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
        $table =Users::find(); 
        $count = clone $table;
        $pages =new Pagination([
          "pageSize" => 10,
          "totalCount" =>$count->count()
        ]);
        $model = $table 
          ->offset($pages->offset)
          ->limit($pages->limit)
          ->all();
        $coun=$table->count();
      }
      return $this->render("users",["model" => $model,"pages" =>$pages,"total"=>$coun,"form"=>$form,"busca"=>$search,"register"=>$register, "actualizar"=>$editar, 'drop'=>$drop, 'editarUsu'=>$infoUsu]);
      }
      else
      {
        $this->goHome();
      }
    }

    private function randKey($str='', $long=0)
    {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }
    
    public function actionRegister()
    {
      //Creamos la instancia con el model de validación
      $model = new FormRegister;
       
      //Mostrará un mensaje en la vista cuando el usuario se haya registrado
      $msg = null;
       
      
      //Validación mediante ajax
      /*if ($model->load(Yii::$app->request->post()))
            {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }*/
       
      //Validación cuando el formulario es enviado vía post
      //Esto sucede cuando la validación ajax se ha llevado a cabo correctamente
      //También previene por si el usuario tiene desactivado javascript y la
      //validación mediante ajax no puede ser llevada a cabo
      if ($model->load(Yii::$app->request->post()))
      {
       if($model->validate())
       {
        //Preparamos la consulta para guardar el usuario
        $table = new Users;
        $table->username = $model->username;
        $table->colaborador = $model->colaborador;
        
        
        //Encriptamos el password
        //$salt = openssl_random_pseudo_bytes(22);
        //$salt2 = '$2a$%07$' . strtr(base64_encode($salt), array('_' => '.', '~' => '/'));
        $table->password = password_hash($model->password, PASSWORD_DEFAULT);
        //Creamos una cookie para autenticar al usuario cuando decida recordar la sesión, esta misma
        //clave será utilizada para activar el usuario
        $table->authKey = $this->randKey("abcdef0123456789", 200);
        //Creamos un token de acceso único para el usuario
        $table->accessToken = $this->randKey("abcdef0123456789", 200);


        $table->grupo=$model->grupo;
         
        //Si el registro es guardado correctamente
        if ($table->insert())
        {
         //Nueva consulta para obtener el id del usuario
         //Para confirmar al usuario se requiere su id y su authKey
         
         $model->username = null;
         $model->colaborador = null;
         $model->password = null;
         $model->password_repeat = null;
         
         Yii::$app->getSession()->addFlash('success', 'Usuario Agregado Correctamente');
         echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/users")."'>";
        }
        else
        {
         Yii::$app->getSession()->addFlash('error', 'No se Pudo Agregar al Usuario');
        
        }
       }
       else
       {
        $model->getErrors();
       }
      }
      echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/users")."'>"; 
    }

    function actionInfoeditarusuario()
    {
      $model = new UsuarioEditar;
      if ($model->load(Yii::$app->request->post())) {
        $form = new FormEditar;
        $usuario = Users::find()->where(['id'=>$model->id])->one();
        $query = new Query;
        $query->select('*')->from('grupos_encender')->orderBy([new \yii\db\Expression("FIELD (grupo, '$model->grupo') DESC")]);
        $command = $query->createCommand();
        $grupos = $command->queryAll();
        $listaGrupos = ArrayHelper::map($grupos, 'grupo', 'descripcion');
        return $this->render("popupEditar", ['usuario'=>$usuario, 'grupos'=>$listaGrupos, 'url'=>$model->url, 'actualizar'=>$form]);
      }
    }

    function actionRestablecercontrasenia(){
      $form = new idEliminar;
      if ($form->load(Yii::$app->request->post())) {
        $usuario = Users::findOne($form->id);
        $usuario->password = password_hash('12345', PASSWORD_DEFAULT);
        if ($usuario->update()) {
          Yii::$app->getSession()->addFlash('warning', 'Contraseña Restablecida!');
          $this->redirect($form->url);
        }
      }
    }

    function actionEditarusuario(){
      $model = new FormEditar;
      if ($model->load(Yii::$app->request->post())) {
        $usuario = Users::findOne($model->id);
        $usuario->grupo = $model->grupo;

        if ($model->numero_colaborador == Yii::$app->user->identity->colaborador && $model->grupo != "Datacenter") {
          $usuario->update();
          Yii::$app->user->logout();
          return $this->redirect('../web/index.php',302);
        }

        $contraUsuario = Yii::$app->user->identity->password;
         if ($model->contra_actual != ""  || $model->contra_actual != null) {
          if ($model->contra_actual == $contraUsuario || password_verify($model->contra_actual, $contraUsuario)) {
            if ($model->contra_nueva != "") {
              //print_r($model->contra_nueva);
              $usuario->password = password_hash($model->contra_nueva, PASSWORD_DEFAULT);
              $usuario->update();
              Yii::$app->user->logout();
              return $this->redirect('../web/index.php',302);
            }
            $usuario->update();
            $this->redirect($model->url);
          }
        }
        $usuario->update();
        $this->redirect($model->url);
      }
    }

    function actionEliminarusuario()
    {
      if (!Yii::$app->user->isGuest) {      
        $form = new idEliminar;                   
        if($form->load(Yii::$app->request->post()))
        {
          if ($form->validate())
          {
            $id = $form->id;
            if ($id != Yii::$app->user->identity->id) {
              $table = Users::deleteAll(['id'=>$id]);
              Yii::$app->getSession()->addFlash('warning', 'Usuario Eliminado');
              $this->redirect($form->url);
              //echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/users")."'>"; 
            }
          }
          else
          {
            $form->getErrors();
          }
        }
        else
        {
          echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/users")."'>"; 
        }
        echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/users")."'>"; 
      }
      else
      {
        $this->goHome();
      } 
    }

    function actionGrupos(){
      if (!Yii::$app->user->isGuest) {
        $nuevo = new frmGrupos;
        $editar = new frmEditarGrupo;
        $eliminar = new idEliminar;
        $grupos = Grupos::find()->all();
        return $this->render('añadirGrupos', ["grupos"=>$grupos, "nuevo"=>$nuevo, "editar"=>$editar, "eliminar"=>$eliminar]);
      }
    }

    function actionGruporegistro(){
      $model = new frmGrupos;
      if ($model->load(Yii::$app->request->post())) {
        $grupo = new Grupos;
        if ($model->validate()) {
          $grupo->grupo = $model->grupo;
          $grupo->descripcion = $model->descripcion;
          if ($grupo->insert()) {
            echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/grupos")."'>";
          }
        }
      }
      echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/grupos")."'>";
    }

    function actionEditargrupo(){
      $model = new frmEditarGrupo;
      if ($model->load(Yii::$app->request->post())) {
        $grupos = Grupos::findOne($model->id);
        if ($model->validate()) {
            $grupos->grupo = $model->grupo;
            $grupos->descripcion = $model->descripcion;
            if ($grupos->update()) {
              echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/grupos")."'>";
            }
        }
      }
      echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/grupos")."'>";
    }

    function actionEliminargrupo(){
      $model = new idEliminar;
      if($model->load(Yii::$app->request->post()))
      {
        if ($model->validate()) {
          $grupo = Grupos::deleteAll(['id'=>$model->id]);
          echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/grupos")."'>";
        }else{
          echo "<meta http-equiv='refresh' content='0; ".Url::toRoute("consultas/grupos")."'>";
        }
      }
    }

    function actionInstanciasvsinstareserv(){
      if (!Yii::$app->user->isGuest) {
        $table = ami::find()
        ->select('count(distinct ami.instance_id) as Instancias', 'count(distinct instancia.instance_id) as AMIs', 'count(distinct instancia.instance_id'-'count(distinct amis.instance_id as Diferencia')
        ->innerJoin('instancia')
        ->where(['ami.fecha' => '2018-07-05'])
        ->andWhere(['instancia.region' => "us-east-1"])
        ->andWhere(['ami.region' => "us-east-1"])
        ->andWhere(['instancia.estatus' => "A"]);

        $model = $table;

        return $this->render('informacion', ['model' => $model]);
      }
    }
}