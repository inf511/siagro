<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sppoligono */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Poligonos de Obra', 'url' => ['index']];

?>
<div class="sppoligono-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->pkPoligono], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar',  ['delete', 'id' => $model->pkPoligono], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar ' . $model->codigo . ' ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['label' => 'Orden de Trabajo', 'value' => $codigo],
            'codigo',
            'descripcion',
        ],
    ]) ?>

</div>
