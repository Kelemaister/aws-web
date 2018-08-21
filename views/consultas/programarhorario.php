<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
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
      <div class="modal-dialog modal-lg ">
        <div class="modal-content">
           <div class="modal-header ">
               <button type="button" class="close"  aria-hidden="true"><a href="<?=Url::toRoute(["consultas/view"])?>">&times;</a></button>
          <center><h4 class="modal-title">Programar encendido/apagado de la instancia <?=$in?>  <span class="  fa fa-cloud-upload"></span></h4></center>
          
          
           </div>
           <div class="modal-body">
                          
      <?php $fechas = ActiveForm::begin([
    "method" => "post",
    "action" => Url::toRoute("consultas/programo"),
    "enableClientValidation" => true,
]);
?>
               <?= $fechas->field($modelito,'instance')->hiddenInput(['value'=>$id])->label(false)?>
               <?= $fechas->field($modelito,'nombre')->hiddenInput(['value'=>$in])->label(false)?>
  <div id="d1"> 
<div id="d1c">
    
 <label>Programar  encendido</label>
    
    
      <?= $fechas->field($modelito, 'fechaon')->widget(DatePicker::classname(), [
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd']]);?>
    
 
    <?= $fechas->field($modelito, 'horaon')->widget(TimePicker::classname(), []); ?>
     
    
</div> 
      
      
       <div id="espacio"></div>
      <div id="d2c">
         
          
<label>Programar  apagado</label>
      <?= $fechas->field($modelito, 'fechaoff')->widget(DatePicker::classname(), [
    'pluginOptions' => [ 'autoclose'=>true,'format' => 'yyyy-mm-dd']]);?>
   
    <?= $fechas->field($modelito, 'horaoff')->widget(TimePicker::classname(), []); ?>
                                              
     
 <div id="d3c">
     <br>
     <br>
     <br>
        <?= Html::submitButton("Programar", ["class" => "btn btn-primary"]) ?>     
      </div>

          
          </div>
     

       </div>
                           
                 
                    
                            

      <?php $fechas->end() ?>
           </div>
     
           <div class="modal-footer">
               
               
             
               
               <button type ="button" class="btn btn-default"><a href="<?=Url::toRoute(["consultas/view"])?>">Cerrar</a></button>
           </div>
      </div>
   </div>
</div>


