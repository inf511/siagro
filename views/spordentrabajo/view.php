<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spordentrabajo */

$this->title = $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Ordenes de Trabajos', 'url' => ['index']];
?>
<div class="spordentrabajo-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->pkOrdenTrabajo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->pkOrdenTrabajo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este Item?',
                'method' => 'post',
            ],
        ]) ?>

    
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'fkGestion',
            'nombre',
            'supervisor',
            'areaEstimada',
            'estado',
            'data',
        ],
    ]) ?>

</div>
