<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Horarios */
?>
<div class="instance-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         'region',
         'zone',
         'volume_id',
         'snapshot_id',
         'tag_name',
         'tag_department',
         'tag_owner',
         'instance_id',
         'instance_name',
         'instance_department',
         'instance_owner',
         'status',
         'size',
         'type',
         'iops',
         'encrypted',
         'delete_on_termination',
         'attach_time',
         'create_time',
         'last_snapshot',
         'last_snapshot_time',
         'dispositivo',
         'estatus',
         'last_updated',
       ],
    ]) ?>

</div>
