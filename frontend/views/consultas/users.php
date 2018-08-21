<?php
use yii\helpers\Url;
 use yii\helpers\Html;
 use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\models\Grupos;
use yii\db\Query;
?>

<h2 align="center" style="margin-top: -20px;">Usuarios</h2>
<div style="width: 114%; display: inline-flex; margin-left: -7%;">
    <div style="width: 40%;">
        <?php 
            $f = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("consultas/users"),
                "enableClientValidation" => true,]);
        ?>
        <div style="width: 70%; display: inline-flex;">
            <?= $f->field($busca, "q")->input("search", ['placeholder' => 'Busqueda por Nombre']) ?>
            <?= Html::submitButton("Buscar", ["class" => "btn btn-primary", 'style' => 'height: 5%; margin-top: 8%; margin-left: 2%;']) ?>
        </div>
        <?php $f->end()?>
        
    </div>
    <div style="width: 20%;text-align: center;">
        <?php
            $listar = ActiveForm::begin([
                "method" => "get",
                "action" => Url::toRoute("consultas/users")]);
        ?>
        <div>
            <?=Html::submitButton("Listar Usuarios", ["class" => "btn btn-primary", 'style'=> 'margin-top: 8%;']) ?>
        </div>
        <?php
            $listar->end();
        ?>
    </div>
    <div style="width: 40%">
        <a href="#pop_procese" class="popup-link" style="float: right;"><button class="btn btn-success" onclick="url('<?= $_SERVER['REQUEST_URI'] ?>')" style="margin-top: 21%">Agregar nuevo</button></a>
    </div>
</div>



<div class="table-responsive" style="width: 114%; margin-left: -7%;">
    <label>Total de datos  <?= $total ?></label>
    
    <a href="<?= Url::toRoute('grupos') ?>" style="margin-left: 85%;">Grupos<span class="glyphicon glyphicon-triangle-right"></span></a>
    <table class="table table-hover table-bordered table-striped" id="tablaUsuarios">
        <thead class="ho">
            <tr>
                <th>Usuario</th>
                <th>Num.Colaborador</th>
                <th>Grupo</th>
                <th style="width: 5%;">Contraseña</th>
                <th style="width: 5%;">Editar</th>
                <th style="width: 5%;">Eliminar</th>
            </tr>
        </thead>

        <?php 
            foreach($model as $row):
        ?>
        <tr>
            <td><?= $row->username?></td>
            <td><?= $row->colaborador?></td>
            <td><?= $row->grupo?></td>
            <td>
                <?php 
                    if ($row->colaborador == Yii::$app->user->identity->colaborador) {
                ?>
                    <span class="glyphicon glyphicon-ban-circle" style="margin-left: 42%; color: red;"></span>
                <?php
                    }else{
                ?>
                    <a href="#popupContra" onclick="restContra('<?= $row->id?>', '<?= $row->username ?>', '<?= $_SERVER['REQUEST_URI'] ?>', '<?= Yii::$app->user->identity->password ?>')">
                        <span class="glyphicon glyphicon-refresh">Restablecer</span>
                    </a>
                <?php
                    }
                ?>
            </td>
            <td>
                <div class="form-inline" style="width: 49%; float: left;">
                    <?php
                        $frmEditar = ActiveForm::begin([
                            'method'=>'post',
                            'action'=>Url::toRoute('infoeditarusuario'),
                            'enableClientValidation'=>true,
                        ]);
                    ?>
                    <div style="display: none;">
                        <?= $frmEditar->field($editarUsu, 'id')->textInput(['value'=>$row->id]); ?>
                        <?= $frmEditar->field($editarUsu, 'grupo')->textInput(['value'=>$row->grupo]); ?>
                        <?= $frmEditar->field($editarUsu, 'url')->textInput(['value'=>$_SERVER['REQUEST_URI']]); ?>
                    </div>

                    <?= Html::submitButton('Editar', ['style'=>'border: 0; background: none; box-shadow: none; border-radius: 0px; color: #337ab7;', 'class'=>"glyphicon glyphicon-edit"]); ?>
                    <?php
                        $frmEditar->end();
                    ?>
                </div>
            </td>
            <td>
                </div>
                <div class="form-inline" style="width: 49%; float: left;">
                <?php
                    if ($row->colaborador == Yii::$app->user->identity->colaborador) {
                ?>
                    <span class="glyphicon glyphicon-ban-circle" style="margin-left: 75%; color: red;"></span>
                <?php
                    }else{
                ?>
                    <a href="#popup" class="popup-link" onClick="eliminar('<?= $row->id?>', '<?= $row->username ?>', '<?= $_SERVER['REQUEST_URI'] ?>');">
                        <span class="glyphicon glyphicon-trash" style="margin-right: 5%;">Eliminar</span>
                    </a>
                <?php
                    }
                ?>
                </div>
            </td>
         </tr>           
        <?php 
            endforeach
        ?>
    </table>
</div>

<div style="width: 118%; margin-left: -9%; text-align: center; margin-top: -3%;">

<?= LinkPager::widget([
    "pagination" => $pages,
]);
?>
</div>

<div class="popup" id="pop_procese">
   <div class="popup-contenedor1" style="text-align: center;">
        <a class="popup-cerrar1" href="#">X</a>
        <div >
            <h1>Registra un nuevo usuario</h1>
            <?php
                $listaGrupos = ArrayHelper::map($drop, 'grupo', 'descripcion');
                //print_r($listaGrupos);
                $formulario= ActiveForm::begin([
                    "method" => "post",
                    "action" => Url::toRoute("consultas/register"),
                    "enableClientValidation" => true,
                    'id' => 'formNuevoUsuario',
                ]);
            ?>
            <div class="form-group">
                <?= $formulario->field($register, "username")->input("text", ['autofocus'=>true]) ?> 
            </div>

            <div class="form-group">
                <?= $formulario->field($register, "colaborador")->input("number")->label("Numero de colaborador") ?>
            </div>

            <div class="form-group">
                <?= $formulario->field($register, "password")->input("password") ?>
            </div>

            <div class="form-group">
                <?= $formulario->field($register, "password_repeat")->input("password") ?>
            </div>
            <div class="form-group">
                <?= $formulario->field($register, 'grupo')->dropDownList($listaGrupos);?>
            </div>

            <?= Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>

            <?php $formulario->end() ?>
            
        </div>
   </div>
</div>

<div class="popup" id="popupContra">
   <div class="popup-contenedor" style="text-align: center;">
        <a class="popup-cerrar" href="#">X</a>
        <h4>Restablecer Contraseña</h4>
        Usuario: <label id="usuarioNombre"></label>
        <br>
        <br>
        Contraseña por Default: <b><i>12345</i></b>
        <br>
        <br>
        <?php  
            $formRestablecer = ActiveForm::begin([
                "method" => "post",
                "action" => Url::toRoute('consultas/restablecercontrasenia'),
                "enableClientValidation" => true,
            ]);
        ?>
        
        <div style="display: block; display: none;">
            <?= $formRestablecer->field($form, 'url')->textInput(['id'=>'URL']) ?>
            <?= $formRestablecer->field($form, 'id')->textInput(['id'=>'idRestabl']) ?>
        </div>
        <?= Html::submitButton("Restablecer", ['class'=> 'btn btn-warning']) ?>

        <?php 
            $formRestablecer->end()
        ?>
    </div>
</div>

<div class="popup" id="popup" style="overflow: auto;">
    <div class="popup-contenedor" style="text-align: center;">
        <a class="popup-cerrar" href="#">X</a>
        <div>
            <h4>¿Esta seguro de eliminar al usuario ?</h4>
            Usuario: <label id="usuarioElim"></label>
            <?php 
                $eliminar = ActiveForm::begin([
                    "method" => "post",
                    "action" => Url::toRoute("consultas/eliminarusuario"),
                    "enableClientValidation" => true,
                    'id' => 'formEliminaUsuario',
                ]);
            ?>
            <br>
            <div class="" style="pointer-events:none; display: none;">
                <?= $eliminar->field($form,'url')->textInput(["id"=>"uri"])->label(false); ?>
                <?= $eliminar->field($form,'id')->textInput(["id"=>"id"])->label(false); ?>
            </div>        
            <?= Html::submitButton("Eliminar", ["class" => "btn btn-danger"]) ?>     
            <?php $eliminar->end();?>
        </div>
   </div>
</div>