<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Horarios */
?>
<div class="instance-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         'image_id',
         'region',
         'tipo',
         'instance_running',
         'nombre',
         'fecha',
         'descripcion',
         'tag_name',
         'tag_owner',
         'tag_department',
         'instance_id',
         'instance_name',
         'instance_department',
         'instance_owner',
         'estatus',
         'size',
       ],
    ]) ?>

</div>
