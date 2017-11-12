<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Speqtipo */

$this->title = 'Tipo de Equipo';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Equipos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speqtipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
