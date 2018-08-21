<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\data\Pagination;
    use yii\widgets\LinkPager;
    use yii\widgets\ActiveForm;
    use kartik\date\DatePicker;
    use kartik\time\TimePicker;

?>

<h2 align="center" style="margin-top: -20px;">Instancias que no tienen ami</h2>
<div style="width: 114%; display: inline-flex; margin-left: -7%;">
    <div style="width: 40%;">
        <?php 
            $f = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("amisall/aminocreadas"),
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
                "action" => Url::toRoute("amisall/aminocreadas")]);
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
                "action" => Url::toRoute("amisall/aminocreadas"),
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
            <th>Id</th>
            <th>Región</th>
            <th>Departamento</th>
            <th>Tipo de instancia</th>
            <th> Estatus</th>
            
        </tr>
        </thead>
        <?php foreach($model as $row):?>
        
        <tr>
            <td><?= $row->tag_name?></td>
            <td><?= $row->instance_id?></td>
            <td><?= $row->region?></td>
            <td><?= $row->tag_department?></td>
            <td><?= $row->instance_type?></td>
            <td><?= $row->instance_state?></td>
            
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
    <?php 
    
    
    
    
    
    
    
    
    
    
    
    
    //codigo para crear archivo txt 
  /*
   
     * 1.- Creamos la variable que contiene el archivo que tenemos que crear.
     * 2.- preguntamos si existe el archivo, si el archivo existe "se ha modificado"
       en caso contrario el archivo se ha creado.
     * 3.- Con fopen abrimos un archivo o url, en este caso vamos a abrir un archivo
       pasando como parámetro la variable $nombre_archivo que es la que contiene 
       nuestro archivo y como segundo parámetro como lo vamos a abrir, en este caso "a"
       que nos abre el fichero en solo lectura y sitúa el puntero al final del fichero
       y en el caso de que no exista lo crea.
 
       ******Para terminar*******
 
       4.-Con el fwrite escribimos dentro del archivo la fecha con la hora de Creación 
       o modificación, según el caso, con la variable $mensaje, 
 
    
     
    $nombre_archivo = "logs1.txt"; 
 
    if(file_exists($nombre_archivo))
    {
        unlink($nombre_archivo);
       
    }
 
    else
    {
       
    }
 $date=date("d-m-Y H:m:s");
    
   
    
 foreach ($model as $mol)
 {
     $nombre=$mol->tag_name."=>".$mol->instance_id;
     $array = array($nombre);
$separad= implode(",", $array);

     
     
     if($archivo = fopen($nombre_archivo, "a"))
    {
        if(fwrite($archivo," ". "\n".$nombre))
        {
            echo "Se ha ejecutado correctamente";
        }
        else
        {
            echo "Ha habido un problema al crear el archivo";
        }
 
        fclose($archivo);
        
        }
 }
         
       
    */
    
 
 ?>
 
 





