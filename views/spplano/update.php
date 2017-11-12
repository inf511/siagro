<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spplano */

$this->title = 'Update Spplano: ' . ' ' . $model->pkPlano;
$this->params['breadcrumbs'][] = ['label' => 'Spplanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkPlano, 'url' => ['view', 'id' => $model->pkPlano]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spplano-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
