<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use \yii\web\Response;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tipo',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'frecuencia',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'region',
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
        'attribute'=>'volume_id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'instance_id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'dispositivo',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'dia',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diasemana',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'volume_status',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'volume_last_updated',
    ],
    [
    'class' => 'kartik\grid\ActionColumn',

     'template' => '{view}{update}',
     'buttons' =>
   [
     'view' => function ($url, $model, $key) {
                         return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['view', 'id' => $model->id]), [
                                     'role'=>'modal-remote',
                                     'id' => 'activity-index-link',
                                     'title' => Yii::t('app', 'View'),

                         ]);
                     },

                     'update' => function ($url, $model, $key) {
                                         return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['update', 'id' => $model->id]), [
                                                     //'id' => 'activity-index-link',
                                                     'title' => Yii::t('app', 'Update'),
                                                     'vAlign'=>'middle',
                                                     'data-toggle'=>'tooltip',
                                                     'dropdown' => false,
                                                     'role'=>'modal-remote',
                                         ]);
                                     },
                                   ]
    ]
];
