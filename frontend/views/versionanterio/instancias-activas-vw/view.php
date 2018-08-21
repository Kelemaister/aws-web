<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Horarios */
?>
<div class="instance-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         'instance_id',
         'region',
         'zone',
         'balancer_id',
         'tag_name',
         'tag_owner',
         'tag_department',
         'tag_creator',
         'tag_reservedid',
         'instance_state',
         'instance_type',
         'valid_reservation',
         'last_backup',
         'last_backup_running',
         'last_ami',
         'last_ami_running',
         'last_update',
         'ebs_optimized',
         'ebs_size',
         'ip_address',
         'private_ip_address',
         'platform',
         'sap_stopstart',
         'sap_hostname',
         'dns_hostname',
         'estatus',
        ],
    ]) ?>

</div>
