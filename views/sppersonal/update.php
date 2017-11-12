<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sppersonal */

$this->title = 'Actualizar : ' . ' ' . $model->pkPersonal;
$this->params['breadcrumbs'][] = ['label' => 'Personales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkPersonal, 'url' => ['view', 'id' => $model->pkPersonal]];
?>
<div class="sppersonal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
