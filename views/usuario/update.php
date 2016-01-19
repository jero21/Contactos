<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Actualizar Usuario: ' . ' ' . $user->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->nombre, 'url' => ['view', 'id' => $user->id_usuario]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'user' => $user,
        'cont' => $cont,
        'dir' => $dir,
        'repr' => $repr,
        'institucion' => $institucion,
        'modelsConocimientos' => $modelsConocimientos,
    ]) ?>

</div>
