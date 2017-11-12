<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use app\models\Speqtipo;
use app\models\Speqmodelo;
use kartik\select2\select2;
use dosamigos\datepicker\DatePicker;
?>

<div class="spequipo-form">

    <?php $form = ActiveForm::begin([
                'method' => 'post',
                'enableClientValidation' => true, # para que no valide en el cliente
                'enableAjaxValidation' => true, # para que no recargue la pagina
            ]); 
    ?>

    <?= $form->field($model, 'fkTipoEquipo')->widget( 
        Select2::className(),
        [
            'data' => ArrayHelper::map(Speqtipo::find()->all(), 'pkEqTipo', 'descripcion'),
            'language'  => 'es',
            'options'   => ['placeholder' => 'Seleccione un Tipo de equipo', 'id' => 'spequipo-fktipoequipo'],
            'pluginOptions' => 
                [
                    'allowClear' => true,
                ],
            'pluginEvents' => 
                [
                    'change'  => 'listarModelos',
                ]
        ]
    );
    ?>
                                        
    <?= $form->field($model, 'fkModelo')->widget( 
        Select2::className(),
        [
            'data' => ArrayHelper::map(Speqmodelo::find()->where(['fkEqTipo' => $model->fkTipoEquipo ])->all(), 'pkEqModelo', 'descripcion'),
            'language'  => 'es',
            'options'   => ['placeholder' => 'Seleccione un Modelo de equipo'],
            'pluginOptions' => 
                [
                    'allowClear' => true,
                ],
            'pluginEvents' => 
                [
                    'change'  => 'getCodModelo',
                ]
        ]
    );
    ?>

    <?= $form->field($model, 'codigo')->widget(MaskedInput::className(), [
                'mask' => '**-**-***',
                        ])
    ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkTipoContrato')->widget(
            Select2::className(),
        [ 
            'data'      => ['PROPIO' => 'PROPIO', 'ALQUILADO'=>'ALQUILADO'],
            'language'  => 'es',
            'options'   => ['placeholder' => 'Seleccione Tipo de Contrato'],
            'pluginOptions' => [ 'allowClear' => true, ],
        ]
        )
    ?>

    <?= $form->field($model, 'fechaIngreso')->widget(
            DatePicker::className(), [
             'inline' => false, 
             'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>

    <?= $form->field($model, 'codObra')->widget(MaskedInput::className(), [
                'mask' => '999-99',
                        ])
    ?>    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
