<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<body >
<div class="site-login">
    <h1 align= center>Iniciar sesión</h1>

    <p align= center></p>

    <div class="row" align= center>
        <div class="container" >
            <p><img src="../views/layouts/imagenes/user2.png" style="width: 100px; height: 100px;" /></p>
            <br>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form-group">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'textbox'])  ?>
                 </div>
                <?= $form->field($model, 'password')->passwordInput(['class'=>'textbox']) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

