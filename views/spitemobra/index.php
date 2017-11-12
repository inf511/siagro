<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpitemobraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items Obras';

?>
<div class="spitemobra-index">

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

            [ 'attribute' => 'fkOrdenTrabajo', 'value' => 'fkOrdenTrabajo0.data'],
            //[ 'attribute' => 'fkPoligono', 'value' => 'fkPoligono0.codigo'],
            //[ 'attribute' => 'fkActividad', 'value' => 'fkActividad0.codigo'],
            'codigo',
            'descripcion',
            // 'areaTrab',
            'rendimiento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
