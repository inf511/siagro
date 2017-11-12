<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spgestion */

$this->title = 'Actulizar : ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Gestiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'id' => $model->pkGestion]];

?>
<div class="spgestion-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
