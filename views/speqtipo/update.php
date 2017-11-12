<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Speqtipo */

$this->title = 'Actualizar : ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'id' => $model->pkEqTipo]];
?>
<div class="speqtipo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
