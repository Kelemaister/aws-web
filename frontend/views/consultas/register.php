<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Users;
use yii\helpers\ArrayHelper;
?>

<h3><?= $msg ?></h3>

<h1>Registra un nuevo usuario</h1>

<?php 

$var = [ 'Datacenter'=> 'Datacenter', 'clubes-dev'=> 'Clubes',  'wire-dev'=> 'Web wire','mobile-dev'=>'Mobiles','ps-dev'=>'Peoplesoft'];

$form= ActiveForm::begin([
                                "method" => "post",
                                "action" => Url::toRoute("consultas/register"),
                                "enableClientValidation" => true,
                            ]);


?>
<div class="form-group">
 <?= $form->field($model, "username")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "colaborador")->input("number")->label("Numero de colaborador") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password") ?>
</div>
<div class="form-group">
    <?= $form->field($model, 'grupo')->dropDownList(
        $var
        );
      
   ?>
</div>

<?= Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>