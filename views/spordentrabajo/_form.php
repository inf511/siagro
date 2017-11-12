<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model app\models\Spordentrabajo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spordentrabajo-form">

    <?php $form = ActiveForm::begin([
                    'method' => 'post',
        ]); 
    ?>

    <?= $form->field($model, 'data')->widget(MaskedInput::className(), [
             'mask' => '999-' . $gestion->codigo,
             ])
    ?>



    <?= $form->field($model, 'fkGestion')->hiddenInput()->label(false)?>
    

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'supervisor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'areaEstimada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO', ], ['prompt' => 'Seleccione estado de Obra']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>