<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\data\Pagination;
    use yii\widgets\LinkPager;
    use yii\widgets\ActiveForm;
    use kartik\date\DatePicker;
use kartik\time\TimePicker;

?>

<h2 align="center" style="margin-top: -20px;">Amis del dia</h2>
<div style="width: 114%; display: inline-flex; margin-left: -7%;">
    <div style="width: 40%;">
        <?php 
            $f = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("amisall/amisdeldia"),
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
                "action" => Url::toRoute("amisall/amisdeldia")]);
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
            <th>Instancia</th>
            <th>Id_instancia</th>
            <th>Región </th>
            <th>Departamento</th>
            <th>Estatus</th>
            <th>Ami</th>
            <th>Id_ami</th>
            <th>Fecha creada</th>
           
        </tr>
        </thead>
        <?php foreach($model as $row):?>
        
        <tr>
            <td><?= $row->tag_name?></td>
            <td><?= $row->instance_id?></td>
            <td><?= $row->region?></td>
            <td><?= $row->tag_department?></td>
            <td><?= $row->instance_state?></td>
            <td><?= $row->nombre?></td>
            <td><?= $row->image_id?></td>
            <td><?= $row->fecha_ami?></td>
            
        </tr>      
        <?php endforeach ?>
    </table>
</div>

<div style="width: 118%; margin-left: -9%; text-align: center; margin-top: -3%;">
    <?= LinkPager::widget([
        "pagination" => $pages,
        ]);
         
         //funcion para encender automaticamente las instancias
        //   echo "<meta http-equiv='refresh' content='60; ".Url::toRoute("consultas/ejecutarprogramacion")."'>"; 
    ?>
</div>  
  
    


