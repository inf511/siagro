<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Speqmodelo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="speqmodelo-form">

    <?php $form = ActiveForm::begin([
    				'method' => 'post',
    				'enableClientValidation' => true, # para que no valide en el cliente
    				'enableAjaxValidation' => false, # para que no recargue la pagina
    		]); 
    ?>

    <?= $form->field($model, 'fkEqTipo')->dropDownList($tipos, ['prompt'=>'SELECCIONE TIPO DE EQUIPO']) ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
