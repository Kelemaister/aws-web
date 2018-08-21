<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Horarios */
?>
<div class="instance-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'snapshot_id',
          'region',
          'image_id',
          'volume_id',
          'instance_id',
          'snapshot_dev',
          'tipo',
          'fecha',
          'descripcion',
          'tag_name',
          'tag_owner',
          'tag_department',
          'estatus',
          'vol_name',
          'vol_department',
          'vol_owner',
          'inst_name',
          'inst_department',
          'inst_owner',
          'size',       
       ],
    ]) ?>

</div>
