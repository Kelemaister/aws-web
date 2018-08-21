<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bitacora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacora-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instance_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'snapshot_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id_dest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_id_dest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'snapshot_id_dest')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
