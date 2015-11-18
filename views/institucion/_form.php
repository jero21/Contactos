<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Institucion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institucion-form">

    <?php $form = ActiveForm::begin(); ?>

    <h3>Información de la institucion</h3>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <h3>Dirección de la institucion</h3>

    <?= $form->field($dir, 'pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'direccion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
