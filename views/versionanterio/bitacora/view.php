<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bitacora */
?>
<div class="bitacora-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'reporte',
            'tipo',
            'fecha',
            'descripcion',
            'estatus',
            'region_id',
            'instance_id',
            'image_id',
            'volume_id',
            'snapshot_id',
            'region_id_dest',
            'image_id_dest',
            'snapshot_id_dest',
        ],
    ]) ?>

</div>
