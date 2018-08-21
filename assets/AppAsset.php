<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
        
        '../css/table.css',
        '../css/site.css',
        '../css/disenio.css',
        '../css/estilo.css',
        '../css/modal.css',
        
    ];
    public $js = [
        '../ajax/myjs.js',
        'js/editar.js',
        
        
        
        
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        
    ];
}
