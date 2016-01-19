<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Conocimiento */

$this->title = 'Create Conocimiento';
$this->params['breadcrumbs'][] = ['label' => 'Conocimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conocimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
