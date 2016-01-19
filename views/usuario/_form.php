<?php

use yii\helpers\Html;
use app\models\NombreConocimiento;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    
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

    <div class="panel panel-default">
        <div class="panel-heading"><h4> Conocimientos del contacto</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsConocimientos[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nombre',
                    'nivel',
                    'descripcion',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsConocimientos as $i => $modelConocimientos): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Conocimiento</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelConocimientos->isNewRecord) {
                                echo Html::activeHiddenInput($modelConocimientos, "[{$i}]id_conocimiento");
                            }
                        ?>
                          <?= $form->field($modelConocimientos, "[{$i}]nombre")->dropDownList(
                                ArrayHelper::map(NombreConocimiento::find()->all(),'id','nombre'),
                                ['prompt'=>'Seleccionar Conocimiento']
                            ) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelConocimientos, "[{$i}]nivel")->dropDownList(['Principiante' => 'Principiante', 'Básico' => 'Básico', 'Intermedio' => 'Intermedio', 'Avanzado' => 'Avanzado'],['prompt'=>'Select Option']); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelConocimientos, "[{$i}]descripcion")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Create', ['class' =>  'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
