<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
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
        'attribute'=>'reporte',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tipo',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fecha',
    ],
  /*  [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'descripcion',
    ],*/
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'estatus',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'region_id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'instance_id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'image_id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'volume_id',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'snapshot_id',
    ],
  /*  [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'region_id_dest',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'image_id_dest',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'snapshot_id_dest',
    ],*/
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'],
    ],

];
