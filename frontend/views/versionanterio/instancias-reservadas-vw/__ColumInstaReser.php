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
      'attribute'=>'instance_type',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'platform',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tag_name',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'instance_state',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'instance_id',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'valid_reservation',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'resv_id',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'resv_region',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'resv_zone',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'resv_instance_type',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'resv_state',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'resv_platform',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'resv_instance_count',
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
