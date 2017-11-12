<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpordentrabajoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spordentrabajo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'supervisor') ?>

    <?= $form->field($model, 'areaEstimada') ?>

    <?= $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
