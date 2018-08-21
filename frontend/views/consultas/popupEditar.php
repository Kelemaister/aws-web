<?php
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>
<div>
    <h1 align="center">Editar Usuario</h1>
    <a href="<?= Url::toRoute('users') ?>"><span class="glyphicon glyphicon-triangle-left" style="margin-top: 10px">Usuarios</span></a>
    <?php 
    //$listaGrupos2 = ArrayHelper::map($drop, 'null', 'descripcion');
        $var = [];
        $formEditar= ActiveForm::begin([
            "method" => "post",
            "action" => Url::toRoute("consultas/editarusuario"),
            "enableClientValidation" => true,
            "id"=>"formEdit",
        ]);
    ?>
    <div class="form-group" style="margin-top: 2%;">
        <?= $formEditar->field($actualizar, "usuario")->input("text", ['id'=>'usuario', 'readonly'=>true, 'Value'=>$usuario->username])->label("Nombre de Usuario") ?>        
        <?= $formEditar->field($actualizar, "numero_colaborador")->input("number", ['id'=>'numero_colaborador', 'readonly'=>true, 'Value'=>$usuario->colaborador])->label("Numero de colaborador") ?>
               
        <?= $formEditar->field($actualizar, 'grupo')->dropDownList($grupos, ['id'=> 'dropGrupos']);?>

        <div id="frmContrasenia" style="display: none;">
            <?= $formEditar->field($actualizar,'contra_actual')->passwordInput(["id"=>"contraActual", 'Value'=>$usuario->password]); ?>
            <?= $formEditar->field($actualizar,'contra_nueva')->passwordInput(["id"=>"contraNueva"]); ?>
        </div>

        <div class="" style="pointer-events:none; display: none;">
            <?= $formEditar->field($actualizar,'url')->textInput(["value"=>$url]); ?>
            <?= $formEditar->field($actualizar,'id')->textInput(["value"=>$usuario->id]); ?>
        </div>
        <?php 
            if ($usuario->colaborador == Yii::$app->user->identity->colaborador) {
        ?>
            <div id="checkbox" style="float: right; display: block;">
            <?= $formEditar->field($actualizar, 'check')->checkbox(["id"=>"check", "onclick"=>"checkbox()"])->label("¿Cambiar Contraseña?-->") ?>
            </div>
        <?php
            }
        ?>
        <br>
                
        <?= Html::submitButton("Guardar", ["class" => "btn btn-success"]) ?>
    </div>

    <?php $formEditar->end() ?>
</div>
