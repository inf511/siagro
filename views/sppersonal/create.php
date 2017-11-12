<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sppersonal */

$this->title = 'Personal';
$this->params['breadcrumbs'][] = ['label' => 'Personales', 'url' => ['index']];

?>
<div class="sppersonal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
