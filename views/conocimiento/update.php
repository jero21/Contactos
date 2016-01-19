<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Conocimiento */

$this->title = 'Update Conocimiento: ' . ' ' . $model->id_conocimiento;
$this->params['breadcrumbs'][] = ['label' => 'Conocimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_conocimiento, 'url' => ['view', 'id' => $model->id_conocimiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conocimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
