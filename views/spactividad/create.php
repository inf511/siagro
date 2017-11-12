<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Spactividad */

$this->title = 'Actividades de Obra';
$this->params['breadcrumbs'][] = ['label' => 'Actividades de Obra', 'url' => ['index']];

?>
<div class="spactividad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
