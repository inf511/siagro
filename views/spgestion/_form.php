<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Spgestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spgestion-form">

    <?php $form = ActiveForm::begin([
    			'method' => 'post',
    			"enableClientValidation" => true, # para que no valide en el cliente
    			"enableAjaxValidation" => false, # para que no recargue la pagina    			
    	]); 
    ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'fechaIni')->widget(
        DatePicker::className(), [
            'inline' => false, 
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>
    
    <?= $form->field($model, 'fechaFin')->widget(
            DatePicker::className(), [
             'inline' => false, 
             'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'T' => 'ACTIVA', 'F' => 'INACTIVA', ], ['prompt' => 'Seleccione estado de gestion']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
