<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spitemobra */

$this->title = 'Actualizar : ' . ' ' . $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Item Obras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo, 'url' => ['view', 'id' => $model->pkItemObra]];

?>
<div class="spitemobra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
