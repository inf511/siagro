<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

use app\models\Spcargo;

?>

<div class="sppersonal-form">

    <?php $form = ActiveForm::begin([
                'method'                    => 'post',
                'enableClientValidation'    => true,
                'enableAjaxValidation'      => true,

    ]); ?>

    

    <?= $form->field($model, 'fechaIngreso')->widget(
        DatePicker::className(), [
            'inline'    => false,
            'language'  => 'es', 
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',

            ],
        ]);
    ?>

    <?= $form->field($model, 'nombreComp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ci')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaNac')->widget(
        DatePicker::className(), [
            'inline'        =>  false,
            'language'      =>  'es',
            'clientOptions' =>  [
                'autoclose' =>  true,
                'format'    =>  'yyyy-mm-dd',
            ],
        ]);
    ?>

    <?= $form->field($model, 'fkcargo')->widget(
            Select2::className(),
            [
                'data'      => ArrayHelper::map(Spcargo::find()->all(), 'pkCargo', 'descripcion'),
                'language'  => 'es',
                'options'   => [
                        'placeholder'   => 'Seleccione cargo de personal',
                    ],
                'pluginOptions'    => [
                        'allowClear'    => true,
                    ],
            ]
        );
    ?>
    
    <?= $form->field($model, 'codObra')->widget(
            MaskedInput::className(),
            [
                'mask'  => '999-99',
            ]
        )
    ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
