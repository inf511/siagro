<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sppersonal */

$this->title = $model->pkPersonal;
$this->params['breadcrumbs'][] = ['label' => 'Personales', 'url' => ['index']];

?>
<div class="sppersonal-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->pkPersonal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->pkPersonal], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar a [ ' . $model->nombreComp . ' ' . $model->apellidos . ' ]?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fechaIngreso',
            'nombreComp',
            'apellidos',
            'direccion',
            'telefono',
            'ci',
            'fechaNac',
            ['label' => 'Cargo de Empleado', 'value' => $dataCargo],
            ['label' => 'Orden de Trabajo de Ingreso', 'value' => $dataOt],
            'email:email',
        ],
    ]) ?>

</div>
