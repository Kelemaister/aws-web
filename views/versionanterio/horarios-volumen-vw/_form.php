<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\InstanciasActivas;
use app\models\Volumen;
use kartik\time\TimePicker;
use app\models\Horarios;




/* @var $this yii\web\View */
/* @var $model app\models\Horarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>-->
    <?= $form->field($model, 'tipo')->dropDownList(['CREATE_AMI' => 'CREATE_AMI', 'BACKUP_RUNNING' => 'BACKUP_RUNNING', 'RESPALDO_VOL' => 'RESPALDO_VOL', 'ENCENDIDO' => 'ENCENDIDO', 'INFO_INSTACIAS' => 'INFO_INSTANCIAS', 'INFO_AMIS' =>  'INFO_AMIS',
    'INFO_SNAPS' => 'INFO_SNAPS', 'INFO_VOLUMENES' => 'INFO_VOLUMENES', 'CHANGE_REG_AMIS' => 'CHANGE_REG_AMIS','INFO_INST_RESERV' => 'INFO_INST_RESERV', 'DEPURA_AMIS' => 'DEPURA_AMIS', 'DEPURA_SNAP' => 'DEPURA_SNAP' ]); ?>

    <!--<?= $form->field($model, 'frecuencia')->textInput(['maxlength' => true]) ?>-->
    <?= $form->field($model, 'frecuencia')->dropDownList(['CADAHORA' => 'CADA HORA', 'DIARIO' => 'DIARIO', 'MENSUAL' => 'MENSUAL',  'SEMANAL' => 'SEMANAL']) ?>

    <!--<?= $form->field($model, 'diasemana')->textInput(['maxlength' => true]) ?>-->
    <?= $form->field($model, 'diasemana')->dropDownList(['Lunes' => 'Lunes', 'Martes' => 'Martes', 'Miercoles' => 'Miercoles', 'Jueves' => 'Jueves', 'Viernes' => 'Viernes', 'Sabado' => 'Sabado','Domingo' => 'Domingo' ]) ?>

    <?= $form->field($model, 'dia_mes')->textInput() ?>

    <!--<?= $form->field($model, 'hora')->textInput() ?>-->

    <?= $form->field($model, 'hora')->widget(TimePicker::className(),
 [
    'readonly' => true,
    'pluginOptions' => [
            'showSeconds' => true,
            'showMeridian' => false,
            'minuteStep' => 1,
            'secondStep' => 5,

    ],
    'options'=>[
        'class'=>'form-control',
    ],
]); ?>


    <!--<?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>-->
    <?= $form->field($model, 'region')->DropDownList(['us-east-1' => 'US East (N. Virginia)', 'us-west-2' => 'US West (Oregon)'])?>

    <?= $form->field($model, 'region_destino')->DropDownList([''=>'innecesario','us-east-1' => 'US East (N. Virginia)', 'us-west-2' => 'US West (Oregon)'])?>

    <!--<?= $form->field($model, 'instance_id')->textInput(['maxlength' => true]) ?>-->

    <?php
        $intance = InstanciasActivas::find()->all();
        $listdata = ArrayHelper::map($intance, 'instance_id','private_ip_address','tag_department',  'instance_id','private_ip_address','tag_department');
        echo $form->field($model, 'instance_id')->dropDownList($listdata,['prompt' => '']);

    ?>

    <!--<?= $form->field($model, 'volume_id')->textInput(['maxlength' => true]) ?>-->
    <?php
    $intance = Volumen::find()->all();
    $listdata = ArrayHelper::map($intance, 'volume_id', 'tag_name','volume_id','tag_name');
    echo $form->field($model, 'volume_id')->dropDownList($listdata,['prompt' => '']);
    ?>

    <!--<?= $form->field($model, 'encender')->textInput() ?>-->
    <?= $form->field($model, 'encender')->widget(TimePicker::className(),
    [
    'readonly' => true,
    'pluginOptions' => [
            'showSeconds' => true,
            'showMeridian' => false,
            'minuteStep' => 1,
            'secondStep' => 5,

    ],
    'options'=>[
        'class'=>'form-control',
    ],
    ]);
    ?>

    <!--<?= $form->field($model, 'apagar')->textInput() ?>-->
    <?= $form->field($model, 'apagar')->widget(TimePicker::className(),
    [
    'readonly' => true,
    'pluginOptions' => [
            'showSeconds' => true,
            'showMeridian' => false,
            'minuteStep' => 1,
            'secondStep' => 5,

    ],
    'options'=>[
        'class'=>'form-control',
    ],
    ]);

    ?>

    <?= $form->field($model, 'instance_reboot')->checkbox() ?>

    <!--<?= $form->field($model, 'servidor_procesos')->textInput(['maxlength' => true]) ?>-->
    <?= $form->field($model, 'servidor_procesos')->dropDownList(['MonitorZabbix' => 'MonitorZabbix']) ?>

    <!--<?= $form->field($model, 'estatus')->textInput(['maxlength' => true]) ?>-->
    <?= $form->field($model, 'estatus')->dropDownList(['A' => 'Activo', 'X' => 'Inactivo']); ?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
