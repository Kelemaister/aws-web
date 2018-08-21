<?php

use yii\helpers\Url;
use yii\helpers\Html;


return[

  [
      'class' => 'kartik\grid\SerialColumn',
      'width' => '30px',
  ],

  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'region',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'zone',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'volume_id',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'snapshot_id',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tag_name',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tag_department',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tag_owner',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'instance_id',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'instance_name',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'instance_department',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'instance_owner',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'status',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'size',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'type',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'iops',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'encrypted',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'delete_on_termination',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'attach_time',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'create_time',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'last_snapshot',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'last_snapshot_time',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'dispositivo',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'estatus',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'last_updated',
  ],
  [
      'class' => 'kartik\grid\ActionColumn',
      'template' => '{view}',
      'buttons' =>
    [
      'view' => function ($url, $model, $key) {
                          return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['view', 'volume_id' => $model->volume_id]), [
                                      'role'=>'modal-remote',
                                      'id' => 'activity-index-link',
                                      'title' => Yii::t('app', 'View'),

                          ]);
                      },

                    ]

  ],

];
