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
      'attribute'=>'image_id',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'region',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'tipo',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'instance_running',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'nombre',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'fecha',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'descripcion',
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
      'attribute'=>'estatus',
  ],
  [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'size',
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
