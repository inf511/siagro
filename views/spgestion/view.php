<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spgestion */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Gestiones', 'url' => ['index']];
?>
<div class="spgestion-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->pkGestion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->pkGestion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar esta Gestion ' . $model->codigo . '?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pkGestion',
            'codigo',
            'fechaIni',
            'fechaFin',
            'estado',
        ],
    ]) ?>

</div>
