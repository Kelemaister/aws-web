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
      'attribute'=>'instance_id',
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
      'attribute'=>'balancer_id',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tag_name',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tag_owner',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tag_department',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tag_creator',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tag_reservedid',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'instance_state',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'instance_type',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'valid_reservation',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'last_backup',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'last_backup_running',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'last_ami',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'last_ami_running',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'last_update',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'ebs_optimized',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'ebs_size',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'ip_address',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'private_ip_address',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'platform',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'sap_stopstart',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'sap_hostname',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'dns_hostname',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'estatus',
  ],
  [
      'class' => 'kartik\grid\ActionColumn',
      'template' => '{view}',
      'buttons' =>
    [
      'view' => function ($url, $model, $key) {
                          return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['view', 'instance_id' => $model->instance_id]), [
                                      'role'=>'modal-remote',
                                      'id' => 'activity-index-link',
                                      'title' => Yii::t('app', 'View'),

                          ]);
                      },

                    ]

  ],

];
