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
        'attribute'=>'diasemana',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'dia_mes',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hora',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'region',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'instance_id',
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
        'attribute'=>'encender',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'apagar',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'instance_reboot',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'last_backup',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'last_ami',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'instance_estatus',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'estatus',
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
                                                        'role'=>'modal-remote',
                                                        'id' => 'activity-index-link',
                                                        'vAlign'=>'middle',
                                                        'data-toggle'=>'tooltip',
                                                        'title' => Yii::t('app', 'Update'),

                                            ]);
                                        },
                                      ]

    ],
];
