<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubInstitucion */

$this->title = 'Actualizar Sub Institucion: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Sub Institucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id_sub_institucion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="sub-institucion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'institucion' => $institucion,
        'dir' => $dir,
    ]) ?>

</div>
