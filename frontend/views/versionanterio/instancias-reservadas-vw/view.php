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
         'instance_type',
         'platform',
         'tag_name',
         'instance_state',
         'instance_id',
         'valid_reservation',
         'resv_id',
         'resv_region',
         'resv_zone',
         'resv_instance_type',
         'resv_state',
         'resv_platform',
         'resv_instance_count',
        ],
    ]) ?>

</div>
