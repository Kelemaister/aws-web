<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
 <meta charset="utf-8">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>
    <body>
   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
           <div class="modal-header ">
               <button type="button" class="close"  aria-hidden="true"><a href="<?=Url::toRoute(["consultas/view"])?>">&times;</a></button>
          <center><h4 class="modal-title">¿Seguro de eliminar si es asi desplazar hacia abajo?  <span class="  fa fa-cloud-upload"></span></h4></center>
          
          
           </div>
           <div class="modal-body">
            <table class="table table-hover table-bordered table-striped">
    
      
    <?php foreach($model as $row):?>
    
    <tr><th>Nombre</th>
        <td><?= $row->tag_name?></td>
    </tr>
    <tr>
        <th>Id</th>
        <td><?= $row->instance_id?></td>
    </tr>
    <tr>
        <th>Fecha a encender </th>
        <td><?= $row->fecha_encendido?></td>
    </tr>
    <tr>
        <th>Hora</th>
        <td><?= $row->hora_encendido?></td>
    </tr>
    <tr>
        <th>Fecha a apagar</th>
        <td><?= $row->fecha_apagado?></td>
    </tr>
    <tr>
         <th>Hora</th>
        <td><?= $row->hora_apagado?></td>
    </tr>
    <tr>
         <th>Confirmar eliminación</th>
         <td>
     
    <?php $eliminar = ActiveForm::begin([
    "method" => "post",
    "action" => Url::toRoute("consultas/detalleseliminacion"),
    "enableClientValidation" => true,
]);
?>
             
                   <?= $eliminar->field($form, "id")->hiddenInput(['value'=>$row->id])->label(false) ?>
             <?= $eliminar->field($form, "proceso")->hiddenInput(['value'=>'eliminar'])->label(false) ?>
                        
                   <button class="btn btn-success">Eliminar</button>
                   
                        
                  
                   

      <?php $eliminar->end() ?>
   
         </td>
    </tr>
          
   
                
                        
         <?php endforeach ?>
</table>
     
       </div>
           <div class="modal-footer">
               <button type ="button" class="btn btn-default"><a href="<?=Url::toRoute(["consultas/view"])?>">Cerrar</a></button>
           </div>
      </div>
   </div>
</div>




