<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;



$this->title = 'Tipos de Equipos';

?>
<div class="speqtipo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('Nuevo', [ 'value' => Url::to('index.php?r=speqtipo/create'), 'id' => 'btnEqTipo', 'class' => 'btn btn-success']) ?>
    </p>

    <?php  
        Modal::Begin([
                'header' => '<h4> Show Tipos de equipos </h4>',
                'id'     => 'modal-eqtipo',
                'size'   => 'modal-lg',
            ]);
        
        echo '<div id="modalContent"></div>';
        
        Modal::end();
    ?>

    <?php Pjax::begin(['enablePushState' => false] );?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'codigo',
                'descripcion',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
