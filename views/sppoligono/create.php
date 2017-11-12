<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sppoligono */

$this->title = 'Poligonos de Obra';
$this->params['breadcrumbs'][] = ['label' => 'Poligonos de Obra', 'url' => ['index']];
?>
<div class="sppoligono-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
