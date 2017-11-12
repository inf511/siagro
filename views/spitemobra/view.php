<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spitemobra */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Item Obras', 'url' => ['index']];

?>
<div class="spitemobra-view">


    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->pkItemObra], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar',  ['delete', 'id' => $model->pkItemObra], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar ' . $model->codigo . '?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pkItemObra',
            ['label' => 'Orden de Trabajo', 'value' => $dataOt],
            ['label' => 'Poligono', 'value' => $dataPol],
            ['label' => 'Actividad', 'value' => $dataAct],
            'codigo',
            'descripcion',
            'areaTrab',
            'rendimiento',
        ],
    ]) ?>

</div>
