<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>
<body>
    <div class="site-login">
        <h1 align= center>Cambio de Contraseña</h1>
        <p align= center></p>
        <div class="row" align= center>
            <div class="container" >
                <p><img src="../views/layouts/imagenes/user2.png" style="width: 100px; height: 100px;" /></p>
                <br>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'action'=>Url::toRoute('site/nuevacontra'),
                    'method'=>'post']
                    );
                ?>
                    <div class="form-group" style="width: 20%;">
                        <?= $form->field($model2, 'username')->textInput(['class'=>'textbox', 'readonly'=>true, 'value'=>$usuario]) ?>
                        <?= $form->field($model2, 'contraseña')->passwordInput(['autofocus' => true, 'class'=>'textbox'])->label("Nueva Contraseña") ?>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Cambiar', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</body>