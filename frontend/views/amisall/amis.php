<?php
use yii\helpers\Url;
 use yii\helpers\Html;
 use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

?>

<h2 align="center" style="margin-top: -20px;">Amis <?= $region?></h2>
<div style="width: 114%; display: inline-flex; margin-left: -7%;">
    <div style="width: 40%;">
        <?php 
            $f = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("amisall/amis"),
                "enableClientValidation" => true,]);
        ?>
        <div style="width: 70%; display: inline-flex;">
            <?= $f->field($form, "q")->input("search", ['style'=> 'margin-top: -2%;']) ?>
            <?= Html::submitButton("Buscar", ["class" => "btn btn-primary", 'style' => 'height: 5%; margin-top: 5%; margin-left: 2%;']) ?>
        </div>
        <?php $f->end()?>
    </div>
    <div style="width: 20%; text-align: center;">
        <?php
            $listar = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("amisall/amis")]);
        ?>
        <div>
            <?=Html::submitButton("Listar Amis", ["class" => "btn btn-primary", 'style'=> 'margin-top: 8%;']) ?>
        </div>
        <?php
            $listar->end();
        ?>
    </div>
    <div style="width: 40%;">
        <?php 
            $fecha = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("amisall/amis"),
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

    <?php
        if ($model == null) {
            
    ?>
            <script>
                alert("No se encontraron amis con esas fechas");
            </script>
    <?php
        }else{
    ?>

<div class="table-responsive" style="width: 114%; margin-left: -7%; margin-top: -1%;">
    <label>Total de datos  <?= $total ?></label>
    <table class="table table-hover table-bordered table-striped input-sm">
        <thead class="ho">
        <tr>
            <th style="width: 24%;">Nombre</th>
            <th style="width: 8%;">Image_Id</th>
            <th style="width: 6%;">Región</th>
            <th style="width: 11%;">Instancia</th>
            <th style="width: 11%;">Departamento</th>
            <th style="width: 11%;">Fecha</th>
            <th>Estatus</th>
            <th style="width: 33%;">Descripción</th>
            
            
        </tr>
        </thead>
        <?php foreach($model as $row):?>
        <tr>
            <td><?= $row->nombre?></td>
            <td><?= $row->image_id?></td>
            <td><?= $row->region?></td>
            <td><?= $row->instance_id?></td>
            <td><?= $row->tag_department?></td>
            <td><?= $row->fecha?></td>
            <td><?= $row->estatus?></td>
            <td><?= $row->descripcion?></td>
            
         </tr>
        <?php endforeach ?>
    </table>
</div>

<?php
    }
?>
<div style="width: 118%; margin-left: -9%; text-align: center; margin-top: -3%;">

<?= LinkPager::widget([
    "pagination" => $pages,
]);
?>
</div>
   
    


