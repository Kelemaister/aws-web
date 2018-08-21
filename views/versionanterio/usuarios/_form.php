<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\DefUsuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="def-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Def_TipoUsuario_id_tipousuario')->dropDownList(['1' =>'Administrador', '2' => 'Colaborador']) ?>

    <?= $form->field($model, 'hotel')->dropDownList(['CEDIS' => 'CEDIS'])?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoColaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tittle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_creacion')->widget(DateTimePicker::classname(), [
        'readonly' => true,
    'options' => ['placeholder' => 'Enter event time ...'],
        'name' => 'fecha_creacion',
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd hh:ii:ss'
    ]
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>




	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
