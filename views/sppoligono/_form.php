<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Sppoligono */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sppoligono-form">

    <?php $form = ActiveForm::begin([
    						'method'					=> 'post',
    						'enableClientValidation'	=> true,
    						'enableAjaxValidation'		=> true,
    								]); 	
    ?>

    <?= $form->field($model, 'codObra')->widget(MaskedInput::className(), [
                'mask' => '999-99',
                        ])
    ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
