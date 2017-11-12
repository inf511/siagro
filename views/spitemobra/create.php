<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Spitemobra */

$this->title = 'Items Obras';
$this->params['breadcrumbs'][] = ['label' => 'Items Obras', 'url' => ['index']];

?>
<div class="spitemobra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
