<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Spordentrabajo */

$this->title = 'Orden de Trabajo';
$this->params['breadcrumbs'][] = ['label' => 'Ordenes de Trabajos', 'url' => ['index']];

?>
<div class="spordentrabajo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'gestion' => $gestion,
    ]) ?>

</div>
