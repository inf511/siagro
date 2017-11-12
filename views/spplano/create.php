<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Spplano */

$this->title = 'Create Spplano';
$this->params['breadcrumbs'][] = ['label' => 'Spplanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spplano-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
