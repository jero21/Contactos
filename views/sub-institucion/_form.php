<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SubInstitucion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-institucion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Institucionid_institucion')->dropDownList($institucion, ['prompt'=>'Selecciona la Institucion']) ?>

    <h3>Dirección de la sub institucion</h3>

    <?= $form->field($dir, 'pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'direccion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
