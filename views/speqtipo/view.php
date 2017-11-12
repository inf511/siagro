<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Speqtipo */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Equipos', 'url' => ['index']];
?>
<div class="speqtipo-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->pkEqTipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->pkEqTipo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este Tipo de Equipo?',
                'method' => 'post', # era post
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
