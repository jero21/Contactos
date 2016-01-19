<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SubInstitucion */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Sub Institucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-institucion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_sub_institucion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_sub_institucion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que quieres eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_sub_institucion',
            'nombre',
            'descripcion',
            'Region',
            'Ciudad',
            'Direccion',
            'NombreInstitucion',
        ],
    ]) ?>

</div>
