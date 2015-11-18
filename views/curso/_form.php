<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <h3> Infomación del Curso </h3>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deescripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nivel')->textInput() ?>

    <?= $form->field($model, 'lugar')->textInput(['maxlength' => true]) ?>

    <h3> Dirección del Curso </h3>

    <?= $form->field($dir, 'pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'direccion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
