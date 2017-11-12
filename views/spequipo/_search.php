<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpequipoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spequipo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'pkEquipo') ?>

    <?= $form->field($model, 'fkTipoEquipo') ?>

    <?= $form->field($model, 'fkModelo') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'fkTipoContrato') ?>

    <?php // echo $form->field($model, 'fechaIngreso') ?>

    <?php // echo $form->field($model, 'fkOrdenTrabajo') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
