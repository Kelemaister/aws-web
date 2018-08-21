<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HorariosVolumenVw */
?>
<div class="horariosVoluemnVw-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'id',
          'tipo',
          'frecuencia',
          //'region',
          'volume_id',
          'instance_id',
          //'dispositivo',
          //'tag_name',
          //'tag_owner',
          //'tag_department',
          //'last_snapshot',
          //'last_snapshot_time',
          //'dia',
          'diasemana',
          'hora',
          'servidor_procesos',
          //'volume_status',
          //'volume_last_updated',
          'estatus',
        ],
    ]) ?>

</div>
