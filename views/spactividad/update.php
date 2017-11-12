<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spactividad */

$this->title = 'Actualizar : ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Actividades de Obra', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'id' => $model->pkActividad]];

?>
<div class="spactividad-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
