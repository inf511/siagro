<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Spequipo */

$this->title = 'Equipo';
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['index']];

?>
<div class="spequipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
