<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spequipo */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['index']];

?>
<div class="spequipo-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->pkEquipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->pkEquipo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este Equipo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pkEquipo',            
            'fkTipoEquipo0.descripcion',
            'fkModelo0.descripcion',
            'codigo',
            'fkTipoContrato',
            'fechaIngreso',
            ['label' => 'Orden de Trabajo', 'value' => $data ],
            'descripcion',
        ],
    ]) ?>

</div>
