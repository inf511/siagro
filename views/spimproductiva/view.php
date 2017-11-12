<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Act. Improductivas', 'url' => ['index']];

?>
<div class="spimproductiva-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->pkImproductiva], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->pkImproductiva], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar [' . $model->descripcion . ']?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'descripcion',
        ],
    ]) ?>
</div>
