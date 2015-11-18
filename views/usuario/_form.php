<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Institucion;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <!-- Usuario info-->
    <?= '<h3>Información personal del contacto</h3>'  ?>

    <?= $form->field($user, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'profesion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'cargo')->textInput(['maxlength' => true]) ?>

   <?= '<h3>Dirección del contacto</h3>'  ?>

    <?= $form->field($dir, 'pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($dir, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= '<h3>Información de contacto</h3>' ?>

    <?= $form->field($cont, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($cont, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($cont, 'nombre_secretaria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($cont, 'mail_secretaria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($cont, 'telefono_secretaria')->textInput(['maxlength' => true]) ?>

     <!-- Institucion info-->

    <?= '<h3>Información de la institución</h3>' ?>

    <?= $form->field($user, 'Institucionid_institucion')->dropDownList($institucion, ['prompt'=>'Selecciona la Institucion']) ?>

    <?= '<h3>Representante</h3>'  ?>

    <?= $form->field($repr, 'grupo')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Create', ['class' =>  'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
