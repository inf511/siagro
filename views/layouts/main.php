<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.ico" type="image/x-icon"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'S I A G R O',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label'    => 'Gestion de Equipos', 
                'url'   => ['#'],  
                'items' => [
                        ['label' => 'Equipos', 'url' => ['/spequipo'] ],
                        ['label' => 'Tipos', 'url' => ['/speqtipo'] ],
                        ['label' => 'Modelos', 'url' => ['/speqmodelo'] ],
                        ['label' => 'Transferencia', 'url' => ['#'] ],
                        ['label' => 'Baja de Equipo', 'url' => ['#'] ],
                ]
            ],  
            ['label'    => 'Gestion de Personal', 
                'url'   => ['#'],  
                'items' => [
                        ['label' => 'Cargos', 'url' => ['/spcargo'] ],
                        ['label' => 'Personal', 'url' => ['/sppersonal'] ],
                        ['label' => 'Transferencia', 'url' => ['#'] ],
                        ['label' => 'Baja de Personal', 'url' => ['#'] ],
                ]
            ],  
            ['label'    => 'Act. Productivas',
                'url'   => ['#'],  
                'items' => [
                        ['label' => 'Actividades', 'url' => ['/spactividad'] ],
                        ['label' => 'Poligonos', 'url' => ['/sppoligono'] ],
                        ['label' => 'Item Obras', 'url' => ['/spitemobra'] ],
                ]
            ],  
            ['label'    => 'Control',
                'url'   => ['#'],  
                'items' => [
                        ['label' => 'Improductivas', 'url' => ['/spimproductiva'] ],
                        ['label' => 'Orden de trabajos', 'url' => ['/spordentrabajo'] ],
                        ['label' => 'Visor de Obras', 'url' => ['/spvisor'] ],
                        ['label' => 'Partes', 'url' => ['#'] ],
                ]
            ],  
            ['label'    => 'Administracion',
                'url'   => ['#'],  
                'items' => [
                        ['label' => 'Gestion', 'url' => ['/spgestion'] ],
                        ['label' => 'Usuarios', 'url' => ['#'] ],
                        ['label' => 'Grupos', 'url' => ['#'] ],
                        ['label' => 'Privilegios', 'url' => ['#'] ],
                ]
            ],            
            //['label' => 'Acerca de', 'url' => ['/site/about']],
            //['label' => 'Contacto', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; SIAGRO <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
