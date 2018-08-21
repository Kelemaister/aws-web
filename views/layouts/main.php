<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    

        <link rel="icon" href="../views/layouts/imagenes/logo1.png" type="image/png"/>
    <title><?= Html::encode($this->title = 'Palace Resorts') ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('../views/layouts/imagenes/logo1_1.png',['alt'=>Yii::$app->name, 'style'=>'margin-top: -15%; width: 70px;']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    //Codigo de version anterior 
   /*  if (!Yii::$app->user->isGuest) {
    $menuItems = [
        
        ['label' => 'Agregar Usuarios', 'url' => ['/consultas/register']],
        ['label' => 'Instancias', 'url' => ['/consultas/view']],
        ['label' => 'Horarios', 'url' => ['/horarios/index']],
        ['label' => 'Bitacora de operaciones', 'url' =>['/bitacora/index']],
        ['label' => 'Admin. Usuarios', 'url' => ['/usuarios/index']],
        ['label' => 'vistas',
          'items' => [
              ['label' => 'Horarios-Volumen-Vw', 'url' => ['/horarios-volumen-vw/index']],
              '<li class="divider"></li>',
              ['label' => 'Horarios-General-Vw', 'url' => ['/horarios-general-vw/index']],
              '<li class="divider"></li>',
              ['label' => 'Horarios-Instancia-Vw', 'url'  => ['/horarios-instancia-vw/index']],
              '<li class="divider"></li>',
              ['label' => 'Horarios-Copiar-Ami-Vw', 'url' => ['/horarios-copiar-ami-vw/index']],
              '<li class="divider"></li>',
              ['label' => 'Horarios-Copiar-Snap-Vw', 'url' =>['/horarios-copiar-snap-vw/index']],
              '<li class="divider"></li>',
              ['label' => 'Instancias-Activas-Vw', 'url' =>['/instancias-activas-vw/index']],
              '<li class="divider"></li>',
              ['label' => 'Instancias-Reservadas-Vw', 'url' =>['/instancias-reservadas-vw/index']],
              '<li class="divider"></li>',
              ['label' => 'Amis-Activas-Vw', 'url' =>['/amis-activas-vw/index']],
              '<li class="divider"></li>',
              ['label' => 'Snapshots-Activos-Vw', 'url' =>['/snapshots-activos-vw/index']],
              '<li class="divider"></li>',
              ['label' => 'Volumenes-Activos-Vw', 'url' =>['/volumenes-activos-vw/index']],
              ],
        ],

    ];}*/
    
    if (!Yii::$app->user->isGuest) {
    $menuItems = [
        
        ['label' => 'Instancia', 'url' => ['consultas/view']],

    ];}
    if (!Yii::$app->user->isGuest){
     $grupo=Yii::$app->user->identity->grupo;
    if ($grupo=='Datacenter') {
    $menuItems = [
        
        
        ['label' => 'Información', 'url' => ['consultas/informacion']],
        ['label' => 'Instancias vs Reservadas', 'url' => ['consultas/instanciasvsreservadas']],
        ['label' => 'Instancias', 'url' => ['consultas/view']],
        ['label' => 'Amis',
          'items' => [
              ['label' => 'Virginia', 'url' => ['amisall/amis']],
              '<li class="divider"></li>',
              ['label' => 'Oregon', 'url' => ['amisall/amioregon']],
              '<li class="divider"></li>',
              ['label' => 'Amis no copiadas a Oregon', 'url' => ['amisall/aminooregon']],
              '<li class="divider"></li>',
              ['label' => 'Amis del dia', 'url' => ['amisall/amisdeldia']],
              '<li class="divider"></li>',
              ['label' => 'Amis no creadas', 'url' => ['amisall/aminocreadas']],
              ],
        ],
        ['label' => 'Snapshots',
          'items' => [
              ['label' => 'Virginia', 'url' => ['snapshots/virginia']],
              '<li class="divider"></li>',
              ['label' => 'Oregon', 'url' => ['snapshots/oregon']],
              
              ],
        ],
        ['label' => 'Usuarios', 'url' => ['/consultas/users']] ,
        ['label' => 'Control de Horarios',
          'items' => [
              ['label' => 'Instancias Programadas', 'url' => ['/horario/instanciasprogramadas']],
              '<li class="divider"></li>',
              ['label' => 'Creacion de AMIS', 'url' => ['/horario/creaciondeamis']],
               '<li class="divider"></li>',
              ['label' => 'Todos los procesos', 'url' => ['/horario/otrosprocesos']],
              
              ],
        ],
        

    ];}
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => ''];
    } else {
        
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Palace Resorts <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
