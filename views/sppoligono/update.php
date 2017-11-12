<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sppoligono */

$this->title = 'Actualizar : ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Poligonos de Obra', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'id' => $model->pkPoligono]];

?>
<div class="sppoligono-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
