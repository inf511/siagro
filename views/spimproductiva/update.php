<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spimproductiva */

$this->title = 'Actualizar : ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Actividades Improductivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'id' => $model->pkImproductiva]];

?>
<div class="spimproductiva-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
