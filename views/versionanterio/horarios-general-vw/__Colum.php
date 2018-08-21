<?php
use yii\helpers\Url;


return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
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
        'attribute'=>'hora',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'servidor_procesos',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'estatus',
    ],
    
];
