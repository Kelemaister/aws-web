<?php
use yii\helpers\Url;
 use yii\helpers\Html;
 use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

?>
<h2 align="center" style="margin-top: -20px;">Lista de Snapshots <?= $region?></h2>
<div style="width: 114%; display: inline-flex; margin-left: -7%;">
    <div style="width: 40%;">
        <?php 
            $f = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("snapshots/oregon"),
                "enableClientValidation" => true,]);
        ?>
        <div style="width: 70%; display: inline-flex;">
            <?= $f->field($form, "q")->input("search") ?>
            <?= Html::submitButton("Buscar", ["class" => "btn btn-primary", 'style' => 'height: 5%; margin-top: 8%; margin-left: 2%;']) ?>
        </div>
        <?php $f->end()?>
    </div>
    <div style="width: 20%; text-align: center;">
        <?php
            $listar = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("snapshots/oregon")]);
        ?>
        <div>
            <?=Html::submitButton("Listar Snapshots", ["class" => "btn btn-primary", 'style'=> 'margin-top: 8%;']) ?>
        </div>
        <?php
            $listar->end();
        ?>
    </div>
    <div style="width: 40%;">
        <?php 
            $fecha = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("snapshots/oregon"),
                "enableClientValidation" => true,]);
        ?>
        <div style="width: 76%; display: inline-flex; float: right;">
            <?= $fecha->field($form1, 'date_1')->widget(DatePicker::classname(), [
                'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'],
                'options'=>['readonly'=>true,
                'placeholder' => 'Seleccione una Fecha']]);
            ?>
            <?= Html::submitButton("Buscar", ["class" => "btn btn-primary", 'style' => 'height: 5%; margin-top: 6%; margin-left: 2%;']) ?>
        </div>
        <?php $fecha->end() ?>
    </div>
</div>

<div class="table-responsive" style="width: 114%; margin-left: -7%; margin-top: -1%;">
<label>Total de datos  <?= $total ?></label>
<table class="table table-hover table-bordered table-striped input-sm">
    <thead class="ho"> 
        <tr>
        <th>Nombre</th>
        <th>Snapshot_Id</th>
        <th>Image_id</th>
        <th>Volume_id</th>
        <th>Región</th>
        <th>Instance_id</th>
        <th>Fecha</th>
        <th>Estatus</th>
        </tr>
    </thead>
    <?php foreach($model as $row):?>
    <tr>
         <td><?= $row->tag_name?></td>
        <td><?= $row->snapshot_id?></td>
        <td><?= $row->image_id?></td>
        <td><?= $row->volume_id?></td>
        <td><?= $row->region?></td>
        <td><?= $row->instance_id?></td>
        <td><?= $row->fecha?></td>
        <td><?= $row->estatus?></td>
        
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
 