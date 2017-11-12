<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\select2\select2;
use app\models\Sppoligono;
use app\models\Spactividad;
use yii\helpers\ArrayHelper;
;
?>

<div class="spitemobra-form">

    <?php $form = ActiveForm::begin([
                            'method'    => 'post',
                            'enableClientValidation' => true,   
                            'enableAjaxValidation'  => true,
                ]);
    ?>
    
    <?= $form->field($model, 'codObra')->widget(MaskedInput::className(), [
                'mask' => '999-99',
                        ])
    ?>    

    <?= $form->field($model, 'fkPoligono')->widget( 
        Select2::className(),
        [
            'data' => ArrayHelper::map(Sppoligono::find()->all(), 'pkPoligono', 'descripcion'),
            'language'  => 'es',
            'options'   => ['placeholder' => 'Seleccione un Poligono'],
            'pluginOptions' => 
                [
                    'allowClear' => true,
                ],
            'pluginEvents' => 
                [
                    'change'  => 'getCodPoligono',
                ],
        ]
    );
    ?>


    <?= $form->field($model, 'fkActividad')->widget( 
        Select2::className(),
        [
            'data' => ArrayHelper::map(Spactividad::find()->all(), 'pkActividad', 'descripcion'),
            'language'  => 'es',
            'options'   => ['placeholder' => 'Seleccione una Actividad'],
            'pluginOptions' => 
                [
                    'allowClear' => true,
                ],
            'pluginEvents' =>
                [
                    'change'  => 'getCodActividad',
                ],
        ]
    );
    ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'areaTrab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rendimiento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
