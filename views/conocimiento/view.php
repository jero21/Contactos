<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Conocimiento */

$this->title = $model->id_conocimiento;
$this->params['breadcrumbs'][] = ['label' => 'Conocimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conocimiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_conocimiento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_conocimiento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_conocimiento',
            'nombre',
            'nivel',
            'descripcion',
        ],
    ]) ?>

</div>
