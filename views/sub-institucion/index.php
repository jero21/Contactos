<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubInstitucionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Institucions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-institucion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sub Institucion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sub_institucion',
            'nombre',
            'descripcion',
            'Institucionid_institucion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
