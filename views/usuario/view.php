<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar datos', ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar Usuario', ['delete', 'id' => $model->id_usuario], [
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
            //'id_usuario',
            'nombre',
            'apellido',
            'profesion',
            'cargo',
            'GrupoRepresentante',
            'ContactosEmail',
            'ContactosTelefono',
            'ContactosNombreSecretaria',
            'ContactosMailSecretaria',
            'ContactosTelefonoSecretaria',
        ],
    ]) ?>

</div>
