<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DefUsuario */
?>
<div class="def-usuario-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'Def_TipoUsuario_id_tipousuario',
            'hotel',
            'password',
            'NoColaborador',
            'tittle',
            'name',
            'estado',
            'fecha_creacion',
        ],
    ]) ?>

</div>
