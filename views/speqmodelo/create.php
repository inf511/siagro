<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Speqmodelo */

$this->title = 'Modelo de Equipo';
$this->params['breadcrumbs'][] = ['label' => 'Modelos de Equipos', 'url' => ['index']];

?>
<div class="speqmodelo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tipos' => $tipos,
    ]) ?>

</div>
