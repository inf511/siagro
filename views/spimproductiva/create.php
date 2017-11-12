<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Spimproductiva */

$this->title = 'Actividades Improductivas';
$this->params['breadcrumbs'][] = ['label' => 'Actividades Improductivas', 'url' => ['index']];

?>
<div class="spimproductiva-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
