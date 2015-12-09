<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubInstitucion */

$this->title = 'Update Sub Institucion: ' . ' ' . $model->id_sub_institucion;
$this->params['breadcrumbs'][] = ['label' => 'Sub Institucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sub_institucion, 'url' => ['view', 'id' => $model->id_sub_institucion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-institucion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
