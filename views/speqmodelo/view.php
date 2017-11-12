<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Speqmodelo */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Modelos de Equipos', 'url' => ['index']];
?>
<div class="speqmodelo-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->pkEqModelo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->pkEqModelo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este Modelo de Equipo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pkEqModelo',
            'fkEqTipo0.descripcion',
            'codigo',
            'descripcion',
        ],
    ]) ?>

</div>
