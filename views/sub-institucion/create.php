<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubInstitucion */

$this->title = 'Create Sub Institucion';
$this->params['breadcrumbs'][] = ['label' => 'Sub Institucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-institucion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'institucion' => $institucion,
        'dir' => $dir,
    ]) ?>

</div>
