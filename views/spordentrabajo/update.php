<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spordentrabajo */

$this->title = 'Actalizar : ' . ' ' . $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Ordenes de Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->data, 'url' => ['view', 'id' => $model->pkOrdenTrabajo]];

?>
<div class="spordentrabajo-update">

    <?= $this->render('_form', [
        'model' => $model,
        'gestion' => $gestion,
    ]) ?>

</div>
