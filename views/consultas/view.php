<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\data\Pagination;
    use yii\widgets\LinkPager;
    use yii\widgets\ActiveForm;
    use kartik\date\DatePicker;
    use kartik\time\TimePicker;
    use yii\bootstrap\Modal;

?>
<div id="en">

</div>

<h2 align="center" style="margin-top: -20px;">Instancias</h2>
<div style="width: 114%; display: inline-flex; margin-left: -7%">
    <div style="width: 40%;">
        <?php
          //print_r($_SERVER['REQUEST_URI']);
            $f = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("consultas/view"),
                "enableClientValidation" => true,]);
        ?>
        <div style="width: 70%; display: inline-flex;">
            <?= $f->field($form, "q")->input("search", ['style'=> 'margin-top: -2%;'], ['placeholder' => 'Busqueda por Nombre']) ?>
            <?= Html::submitButton("Buscar", ["class" => "btn btn-primary", 'style' => 'height: 5%; margin-top: 5%; margin-left: 2%;']) ?>
        </div>
        <?php $f->end()?>
    </div>
    <div style="width: 20%; text-align: center;">
        <?php
            $listar = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("consultas/view")]);
        ?>
        <div>
            <?=Html::submitButton("Listar Instancias", ["class" => "btn btn-primary", 'style'=> 'margin-top: 8%;']) ?>
        </div>
        <?php
            $listar->end();
        ?>
    </div>
</div>

<div class="table-responsive" style="width: 114%; margin-left: -7%; margin-top: -1%;">
  <label>Total de datos  <?= $total ?></label>
  <table class="table table-hover table-bordered table-striped input-sm">
      <thead class="ho">
          <tr>
          <th>Nombre</th>
          <th>Id</th>
          <th>Región </th>
          <th>Departamento</th>
          <th>Tipo de instancia</th>
          <th>Modo</th>
          <th>Detalles</th>
          <?php if ($grupo=Yii::$app->user->identity->grupo == "Datacenter") {?>
            <th>Opciones</th>
          <?php }?>
         
      </tr>
      </thead>
      <?php 
      $grupo=Yii::$app->user->identity->grupo;
      foreach($model as $row):?>
      
      <tr>
          <td><?= $row->tag_name?></td>
          <td><?= $row->instance_id?></td>
          <td><?= $row->region?></td>
          <td><?= $row->tag_department?></td>
          <td><?= $row->instance_type?></td>
          <td><?= $row->instance_state?></td>
          <td>
              <a href="#popup" class="popup-link" 
                 onclick="detalles('<?= $row->instance_id?>',
                              '<?= $row->tag_name?>',
                              '<?= $row->last_ami?>',
                              '<?= $row->last_ami_running?>',
                              '<?= $row->ip_address?>',
                              '<?= $row->private_ip_address?>',
                              '<?= $row->instance_state?>',
                              '<?= $grupo ?>',
                              '<?= $_SERVER['REQUEST_URI'] ?>')
                             ;">
              <span class="glyphicon glyphicon-eye-open">Ver</span></a>
          </td>
          <?php $grupo=Yii::$app->user->identity->grupo;
            if ($grupo=='Datacenter') { ?>
              <td>
                <a href="#pop-opciones" class="popup-link"
                  onclick="opciones('<?= $row->instance_id?>'),instancias()">
                  <span class="glyphicon glyphicon-option-vertical">Opciones</span></a>
              </td>
          <?php } ?> 
      </tr>
    <?php endforeach ?>
  </table>
</div>

<div style="width: 118%; margin-left: -9%; text-align: center; margin-top: -3%;">

<?= LinkPager::widget([
    "pagination" => $pages,
]);
?>
</div>


<!--modal para detallles-->
<div class="popup" id="popup">
   <div class="popup-contenedor">
      <a class="popup-cerrar" href="#">X</a>
        <h4>Mostrando detalles</h4>
        <table class="table table-hover table-bordered">
          <tr>
          <th>Nombre</th>
            <td id="nombre"></td>
          </tr>
          <tr>
            <th>Instance_id</th>
            <td id="instance"></td>
          </tr>
          <tr>
            <th>Last_Ami</th>
            <td id="ami1"></td>
          </tr>
          <tr>
            <th>Last_Ami_Running</th>
            <td id="ami2"></td>
          </tr>
          <tr>
            <th>Ip address</th>
            <td id="ip1"></td>
          </tr>
          <tr>
            <th>Modo</th>
            <td id="ip2"></td>
          </tr>
          <tr id="Encender/Apagar">
            <th>Encender/apagar</th>
            <td>
              <?php $encender = ActiveForm::begin([
                "method" => "post",
                "action" => Url::toRoute("consultas/encender"),
                "enableClientValidation" => true,
              ]);
              ?>
              <?= $encender->field($forminstancia,'instancia')->textInput(["class"=> "oculta", "id"=>"instancia"])->label(false); ?>
              <?= $encender->field($forminstancia, "action")->textInput(["class"=> "oculta", "id"=>"action"])->label(false); ?>
              <?= $encender->field($forminstancia, "urlActual")->textInput(["class"=>"oculta", "id"=>"url"])->label(false); ?>
              <?php $grupo=Yii::$app->user->identity->grupo;?>
              <div id="boton" style="display: none;">
                <?= Html::submitButton("Encender/Apagar",["id"=>"btn"]);?> <!-- El texto y clase cambiaran dependiendo el estado de la instancia y el grupo del usuario con JavaScript en ajax/myjs.js-->
              </div>
              <?php $encender->end() ?>
            </td>
          </tr>
        </table>
   </div>
</div>
<!--fin -->
<!--modal para opciones-->


<div class="popup1" id="pop-opciones">
  <div class="popup-contenedor1">
    <a class="popup-cerrar1" href="#">X</a>
    <div>
      <div>
        <button class="btn btn-primary" onclick="instancias()">ENCENDIDO INSTANCIA</button><button class="btn btn-success" onclick="ami();">CREACION DE AMI</button>
                  
        <div id="p_instancia" style="display: none;">
                      <h4>Programando encendido de la instancia</h4>
            <?php $encendido = ActiveForm::begin([
              "method" => "post",
              "action" => Url::toRoute("horario/inserthorario"),
              "enableClientValidation" => true,
            ]);?>
                      
            <div class="" style="pointer-events:none;">
              <?= $encendido->field($modelhorario,'tipo')->textInput(['value'=>'ENCENDIDO']); ?>
            </div>
          <?= $encendido->field($modelhorario, 'frecuencia')->dropDownList($frecuencia);?>
          <?= $encendido->field($modelhorario, 'dia')->dropDownList($dia);?>
          <?= $encendido->field($modelhorario,'region')->textInput(['value'=>'us-east-1']); ?>
          <?= $encendido->field($modelhorario,'instance')->textInput(["id"=>"cv_instancia"]); ?>
          <?= $encendido->field($modelhorario, 'encender')->widget(TimePicker::classname(), ['pluginOptions' => [
              'showSeconds' => true,
              'showMeridian' => false,
              'minuteStep' => 1,
              'secondStep' => 5,]]); ?>
                      
          <?= $encendido->field($modelhorario, 'apagar')->widget(TimePicker::classname(), ['pluginOptions' => [
              'showSeconds' => true,
              'showMeridian' => false,
              'minuteStep' => 1,
              'secondStep' => 5,]]); ?>
                      
          <?= $encendido->field($modelhorario,'servidor')->textInput(['value'=>'MonitorZabbix']); ?>
          <?= $encendido->field($modelhorario, 'estatus')->dropDownList($estatus);?>
                      
          <?= Html::submitButton("Programar", ["class" => "btn btn-primary"]) ?>     
                        
          <?php $encendido->end();?>
        </div>
                  
        <div id="p_ami"  style="display: none;">
          <h4>Programando creacion de  ami en base a la instancia</h4>
          <?php $addami = ActiveForm::begin([
            "method" => "post",
            "action" => Url::toRoute("horario/createami"),
            "enableClientValidation" => true,
          ]);
          ?>
          <div class="" style="pointer-events:none;">
            <?= $addami->field($createami,'tipo')->textInput(['value'=>'CREATE_AMI']); ?>
          </div>
          <?= $addami->field($createami, 'frecuencia')->dropDownList($frecuencia);?>
          <?= $addami->field($createami, 'dia')->dropDownList($dia);?>
          <?= $addami->field($createami,'diaMes')->input('number'); ?>
          <?= $addami->field($createami, 'hora')->widget(TimePicker::classname(), ['pluginOptions' => [
              'showSeconds' => true,
              'showMeridian' => false,
              'minuteStep' => 1,
              'secondStep' => 5,]]); ?>
                        
          <?= $addami->field($createami,'region')->textInput(['value'=>'us-east-1']); ?>
          <?= $addami->field($createami,'region_destino')->textInput(); ?>
          <?= $addami->field($createami,'instance')->textInput(["id"=>"cv_instancia1"]); ?>
          <?= $addami->field($createami, 'encender')->widget(TimePicker::classname(), ['pluginOptions' => [
              'showSeconds' => true,
              'showMeridian' => false,
              'minuteStep' => 1,
              'secondStep' => 5,]]); ?>
                      
          <?= $addami->field($createami, 'apagar')->widget(TimePicker::classname(), ['pluginOptions' => [
              'showSeconds' => true,
              'showMeridian' => false,
              'minuteStep' => 1,
              'secondStep' => 5,]]); ?>
                      
          <?= $addami->field($createami,'servidor')->textInput(['value'=>'MonitorZabbix']); ?>
          <?= $addami->field($createami, 'estatus')->dropDownList($estatus);?>
          <?= Html::submitButton("Programar", ["class" => "btn btn-primary"]) ?> 
          <?php $addami->end();?>
        </div>
      </div>
    </div>
   </div>
</div>
