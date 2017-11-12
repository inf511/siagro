<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SpgestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestiones';

?>
<div class="spgestion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['enablePushState' => false]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            [
                'attribute' =>  'fechaIni',
                'value'     =>  'fechaIni',
                'format'    =>  'raw',
                'filter'    =>  DatePicker::widget([
                                'model'         => $searchModel,
                                'attribute'     => 'fechaIni',
                                'language'      => 'es',
                                'clientOptions' => 
                                                [
                                                'autoclose' => true,
                                                'format' => 'yyyy-mm-dd'
                                                ]
                                ]),
            ],
            
            [
                'attribute' =>  'fechaFin',
                'value'     =>  'fechaFin',
                'format'    =>  'raw',
                'filter'    =>  DatePicker::widget([
                                'model'         => $searchModel,
                                'attribute'     => 'fechaFin',
                                'language'      => 'es',
                                'clientOptions' => 
                                                [
                                                'autoclose' => true,
                                                'format' => 'yyyy-mm-dd'
                                                ]
                                ]),
            ],
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
