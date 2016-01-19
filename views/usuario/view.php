<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_usuario], [
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
            //'id_usuario',
            'nombre',
            'apellido',
            'profesion',
            'cargo',
            'GrupoRepresentante',
            'Email',
            'Telefono',
            'NombreSecretaria',
            'MailSecretaria',
            'TelefonoSecretaria',
            'NombreInstitucion',
            'Region',
            'Ciudad',
            'Direccion',
            //'SubInstitucion',

        ],
    ]) ?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],

            //'id_usuario',
            'nombre',
            'nivel',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
