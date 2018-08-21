<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;

?>



<h2 align="center">Lista de Usuarios</h2>



<br>
<label>Total de datos  <?= $total ?></label>

<table class="table table-hover table-bordered table-striped">
    <thead class="ho">
    <tr>
        <th>Instancia</th>
        <th>Id_instancia</th>
        <th>Nombre Instancia</th>
        <th>Fecha a encender</th>
        <th>Hora encendido</th>
        <th>Fecha apagado</th>
        <th>Hora apagado</th>
        <th>Estado</th>
        <th>Opciones</th>
       
    </tr>
    </thead>
    <?php foreach($model as $row):?>
    <tr>
        <td><?= $row->tag_name?></td>
        <td><?= $row->instance_id?></td>
        <td><?= $row->fecha_encendido?></td>
        <td><?= $row->hora_encendido?></td>
        <td><?= $row->fecha_apagado?></td>
        <td><?= $row->hora_apagado?></td>
        <?php if($row->estatus=='1'){?>
        <th>Creado</th>
        <?php } ?>
        <?php if($row->estatus=='2'){?>
        <th>Encendido</th>
        <?php } ?>
        <?php if($row->estatus=='3'){?>
        <th>Apagado</th>
        <?php } ?>
        <td><?= Html::a('Eliminar',['consultas/detalleseliminacion','id' =>$row->id,'nombre'=>$row->tag_name,'proceso'=>'pregunta']) ?></td>
        <br>
        <td><?= Html::a('Editar',['#','id' =>$row->id,'nombre'=>$row->tag_name,'proceso'=>'pregunta']) ?></td>
     </tr>
                    
                
               
                        
         <?php endforeach ?>

 </table>
<?= LinkPager::widget([
    "pagination" => $pages,
 ]);
 ?>
   
    


