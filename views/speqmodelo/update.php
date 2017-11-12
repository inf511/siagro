<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Speqmodelo */

$this->title = 'Actualizar : ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Modelos de Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'id' => $model->pkEqModelo]];
?>
<div class="speqmodelo-update">

    <?= $this->render('_form', [
        'model' => $model,
        'tipos' => $tipos,
    ]) ?>

</div>
