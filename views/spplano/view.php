<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spplano */

$this->title = $model->pkPlano;
$this->params['breadcrumbs'][] = ['label' => 'Spplanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spplano-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pkPlano], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pkPlano], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pkPlano',
            'fkOrdenTrabajo',
            'descripcion',
            'codigo',
            'poligono',
        ],
    ]) ?>

</div>
