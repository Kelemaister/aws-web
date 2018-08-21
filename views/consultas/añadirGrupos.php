<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<h2 align="center" style="margin-top: -0px;">Grupos</h2>
<div style="width: 100%; display: inline-flex; margin-top: 4%;">
	<div style="width: 40%;">
		<a href="<?= Url::toRoute('users') ?>"><span class="glyphicon glyphicon-triangle-left" style="margin-top: 10px">Usuarios</span></a>
    </div>
    <div style="width: 20%;text-align: center;">
        
    </div>
    <div style="width: 40%">
        <a href="#pop_grupoNuevo" class="popup-link" style=""><button class="btn btn-success" onclick="url('<?= $_SERVER['REQUEST_URI'] ?>')" style="margin-bottom: 5%; float: right;">Agregar nuevo</button></a>
    </div>
</div>

<div class="table-responsive" style="width: 100%;">
    <table class="table table-hover table-bordered table-striped" id="tablaUsuarios">
        <thead class="ho">
            <tr>
                <th>Grupo</th>
                <th>Descripción</th>
                <th style="width: 5%;">Editar</th>
                <th style="width: 5%;">Eliminar</th>
            </tr>
        </thead>
		<tbody>
			<?php foreach($grupos as $row):?>
        	<tr>
            	<td><?= $row->grupo?></td>
            	<td><?= $row->descripcion?></td>
            	<td>
	                <div class="form-inline" style="width: 49%; float: left;">
	                    <a href="#popupEditar" class="popup-link" onClick="EditarGrupo('<?= $row->id?>',
	                        '<?= $row->grupo?>',
	                        '<?= $row->descripcion?>');">
	                        <span class="glyphicon glyphicon-edit" style="margin-right: 5%;">Editar</span>
	                    </a>
	            </td>
	            <td>
	                </div>
	                <div class="form-inline" style="width: 49%; float: left;">
	                	<a href="#popupEliminar" class="popup-link" onClick="EliminarGrupo('<?= $row->id?>', '<?= $row->grupo ?>', '<?= $_SERVER['REQUEST_URI'] ?>');">
	                        <span class="glyphicon glyphicon-trash" style="margin-right: 5%;">Eliminar</span>
	                    </a>
	                </div>
	            </td>
	         </tr>           
	    	<?php endforeach ?>
		</tbody>
    </table>
</div>

<div class="popup" id="pop_grupoNuevo">
   <div class="popup-contenedor1" style="text-align: center;">
        <a class="popup-cerrar1" href="#">X</a>
        <h1>Añadir un Nuevo Grupo</h1>
		<?php 
			$formNuevo = ActiveForm::begin([
				'method' => 'post',
				'action' => Url::toRoute("consultas/gruporegistro"),
				'enableClientValidation' => true,
			]);
		?>

		<div class="form-group">
			<?= $formNuevo->field($nuevo, 'grupo')->textInput()->label('Grupo'); ?>
			<?= $formNuevo->field($nuevo, 'descripcion')->textInput()->label('Descripción'); ?>
			<?= Html::submitButton("Guardar", ['class'=>'btn btn-success']); ?>
		</div>
		<?php
			$formNuevo->end()
		?>
   </div>
</div>

<div class="popup" id="popupEditar">
   <div class="popup-contenedor1">
        <a class="popup-cerrar" href="#">X</a>
        <div >
            <h1 align="center">Editar Grupo</h1>
            <?php 
                $formEditar= ActiveForm::begin([
                    "method" => "post",
                    "action" => Url::toRoute("consultas/editargrupo"),
                    "enableClientValidation" => true,
                ]);
            ?>
            <div class="form-group">
                <?= $formEditar->field($editar, "grupo")->input("text", ['id'=>'grupo'])->label("Nombre del Grupo") ?>
                
                <?= $formEditar->field($editar, "descripcion")->input("text", ['id'=>'descripcion'])->label("Descripción del Grupo") ?>
               
                <div class="" style="pointer-events:none; display: none;">
                    <?= $formEditar->field($editar,'id')->textInput(["id"=>"id"]); ?>
                </div>
                <br>
                
                <?= Html::submitButton("Guardar", ["class" => "btn btn-success"]) ?>
            </div>

            <?php $formEditar->end() ?>
        </div>
   </div>
</div>

<div class="popup" id="popupEliminar" style="overflow: auto;">
    <div class="popup-contenedor" style="text-align: center;">
        <a class="popup-cerrar" href="#">X</a>
        <div>
            <h4>¿Esta seguro de eliminar el grupo?</h4>
            Grupo: <label id="grupoElim"></label>
            <?php 
                $eliminarGrupo = ActiveForm::begin([
                    "method" => "post",
                    "action" => Url::toRoute("consultas/eliminargrupo"),
                    "enableClientValidation" => true,
                ]);
            ?>
            <br>
            <div class="" style="pointer-events:none; display: none;">
                <?= $eliminarGrupo->field($eliminar,'id')->textInput(["id"=>"idGrupo"])->label(false); ?>
                <?= $eliminarGrupo->field($eliminar,'url')->textInput(["id"=>"urlEl"])->label(false); ?>
            </div>        
            <?= Html::submitButton("Eliminar", ["class" => "btn btn-danger"]) ?>     
            <?php $eliminarGrupo->end();?>
        </div>
   </div>
</div>