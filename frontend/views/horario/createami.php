<?php
use yii\helpers\Url;
 use yii\helpers\Html;
 use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use yii\helpers\ArrayHelper;
use app\models\Instancias;

?>

<h2 align="center" style="margin-top: -20px;">Creación de AMIS</h2>
<div style="width: 114%; display: inline-flex; margin-left: -7%;">
    <div style="width: 40%;">
        <?php 
            $f = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("horario/creaciondeamis"),
                "enableClientValidation" => true,]);
        ?>
        <div style="width: 70%; display: inline-flex;">
            <?= $f->field($form, "q")->input("search", ['placeholder' => 'Busqueda por Nombre']) ?>
            <?= Html::submitButton("Buscar", ["class" => "btn btn-primary", 'style' => 'height: 5%; margin-top: 8%; margin-left: 2%;']) ?>
        </div>
        <?php $f->end()?>
    </div>
    <div style="width: 20%; text-align: center;">
        <?php
            $listar = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("horario/creaciondeamis")]);
        ?>
        <div>
            <?=Html::submitButton("Listar Amis", ["class" => "btn btn-primary", 'style'=> 'margin-top: 8%;']) ?>
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
        <th style="width: 13%;">Grupo</th>
        <th style="width: 13%;">Tipo</th>
        <th>Frecuencia</th>
        <th>Dia</th>
        <th>Dia_mes</th>
        <th>Hora</th>
        <th style="width: 7%;">Región</th>
        <th style="width: 13%;">Id_instancia</th>
        <th>Encender</th>
        <th>Apagar</th>
        <th>Servidor_procesos</th>
        <th>Estatus</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    </thead>
    <?php
        foreach($model as $row):
    ?>
    <tr>
        <td><?= $row['tag_name']?></td>
        <td><?= $row['tipo'] ?></td>
        <td><?= $row['frecuencia']?></td>
        <td><?= $row['diasemana']?></td>
        <td><?= $row['dia_mes']?></td>
        <td><?= $row['hora']?></td>
        <td><?= $row['region']?></td>
        <td><?= $row['instance_id']?></td>
        <td><?= $row['encender']?></td>
        <td><?= $row['apagar']?></td>
        <td><?= $row['servidor_procesos']?></td>
        <td><?= $row['estatus']?></td>
        <td>
            <a href="#popupEditar" class="popup-link" onClick="editarInstanciasProgramadas('<?= $row['diasemana'] ?>',
                '<?= $row['encender'] ?>',
                '<?= $row['apagar'] ?>',
                '<?= $row['estatus']?>',
                '<?= $row['id'] ?>',
                '<?= $row['tag_name'] ?>',
                '<?= $_SERVER['REQUEST_URI'] ?>')">
                <span class="glyphicon glyphicon-edit" style="margin-right: 5%;">Editar</span>
            </a>
       </td>
        <td>
            <a href="#popupEliminar" class="popup-link" onClick="llenar('<?= $row['id'] ?>',
                '<?= $row['tag_name'] ?>',
                '<?= $_SERVER['REQUEST_URI'] ?>')">
                <span class="glyphicon glyphicon-trash" style="margin-right: 5%;">Eliminar</span>
            </a>
        </td>
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

<div class="popup" id="popupEditar" style="overflow: auto;">
    <div class="popup-contenedor">
        <a class="popup-cerrar" href="#">X</a>
        <div style="text-align: center;">
            <h4>Editar Programación.</h4>
            <label id="grupoNomb"></label>
        </div>
        <?php
            $array = [];//Array vacio para poder usar dropDownList, --Los items del dropDownList cambiaran en ajax/myjs.js / function editarInstanciasProgramadas()--
            $editar = ActiveForm::begin([
                "method" => "post",
                "action" => Url::toRoute("horario/editarinstanciacreacionamis"),
                "enableClientValidation" => true,
            ]);
        ?>
        <?= $editar->field($actualizar,'dia')->dropDownList($array, ["id"=>"dia"]); ?>

        <?= $editar->field($actualizar, 'horaEncender')->widget(TimePicker::classname(), ['pluginOptions' => [
            'showSeconds' => true,
            'showMeridian' => false,
            'minuteStep' => 1,
            'secondStep' => 5,],
            'options' => ['id' => 'horaEncender','readonly' => true,]]); ?>

            

        <?= $editar->field($actualizar, 'horaApagar')->widget(TimePicker::classname(), ['pluginOptions' => [
            'showSeconds' => true,
            'showMeridian' => false,
            'minuteStep' => 1,
            'secondStep' => 5,], 
            'options' => ['id' => 'horaApagar','readonly' => true,]]); ?>

        <?= $editar->field($actualizar,'status')->dropDownList($array, ["id"=>"status"]); ?>
                        
        <div class="" style="pointer-events:none; display: none;">
            <?= $editar->field($actualizar,'url')->textInput(["id"=>"urlActual"]); ?>
            <?= $editar->field($actualizar,'id')->textInput(["id"=>"id"]); ?>
        </div>             
        <?= Html::submitButton("Editar", ["class" => "btn btn-primary"]) ?>                  
        <?php $editar->end();?>
    </div>
</div>
    
<div class="popup" id="popupEliminar" style="overflow: auto;">
    <div class="popup-contenedor" style="text-align: center;">
        <a class="popup-cerrar" href="#">X</a>
            <h4>¿Esta seguro de eliminar programación?</h4>
            <label id="nombPrograElim"></label>
            <?php 
                $eliminar = ActiveForm::begin([
                    "method" => "post",
                    "action" => Url::toRoute("horario/eliminarprogramacion"),
                    "enableClientValidation" => true,
                ]);
            ?>
        <br>
        <div class="" style="pointer-events:none; display: none;">
            <?= $eliminar->field($delete,'url')->textInput(["id"=>"urlActual2"]); ?>
            <?= $eliminar->field($delete,'id')->textInput(["id"=>"idUsuarioElim"]); ?>
        </div>      
        <?= Html::submitButton("Eliminar", ["class" => "btn btn-danger"]) ?>                   
        <?php $eliminar->end();?>
    </div>
</div>

