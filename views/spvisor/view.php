<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;


use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;

use kartik\builder\TabularForm;
use kartik\grid\GridView;

$this->title = "Obras";

/*
$coord = new LatLng([
                'lat' => -17.742312, 
                'lng' => -63.048559]);

$map = new Map([
    'center' => $coord,
    'zoom' => 10,
]);
*/

use yii\data\ArrayDataProvider;
$dataProvider = new ArrayDataProvider([
    'allModels'=>[
        ['id'=>1, 'name'=>'Book Number 1', 'publish_date'=>'25-Dec-2014'],
        ['id'=>2, 'name'=>'Book Number 2', 'publish_date'=>'02-Jan-2014'],
        ['id'=>3, 'name'=>'Book Number 3', 'publish_date'=>'11-May-2014'],
        ['id'=>4, 'name'=>'Book Number 4', 'publish_date'=>'16-Apr-2014'],
        ['id'=>5, 'name'=>'Book Number 4', 'publish_date'=>'16-Apr-2014'],
        ['id'=>6, 'name'=>'Book Number 4', 'publish_date'=>'16-Apr-2014'],
        ['id'=>7, 'name'=>'Book Number 4', 'publish_date'=>'16-Apr-2014'],
        ['id'=>8, 'name'=>'Book Number 4', 'publish_date'=>'16-Apr-2014'],
        ['id'=>9, 'name'=>'Book Number 4', 'publish_date'=>'16-Apr-2014'],
        ['id'=>10, 'name'=>'Book Number 4', 'publish_date'=>'16-Apr-2014'],
        ['id'=>11, 'name'=>'Book Number 5', 'publish_date'=>'16-Apr-2014']
    ]
]);

?>

<div class="spvisor-view">

    <?php 
        //$map->width = $ancho;
        //$map->height = $alto;
    	//echo $map->display();
       
        echo Html::beginForm();
        echo TabularForm::widget([
            // your data provider
            'dataProvider'=>$dataProvider,
            
            // set entire form to static only (read only)
            'staticOnly'=>true,
            'actionColumn'=>false,
         
            // formName is mandatory for non active forms
            // you can get all attributes in your controller 
            // using $_POST['kvTabForm']
            'formName'=>'kvTabForm',
            
            // set defaults for rendering your attributes
            'attributeDefaults'=>[
                'type'=>TabularForm::INPUT_TEXT,
            ],
            
            // configure attributes to display
            'attributes'=>[
                'id'=>['label'=>'ID', 'type'=>TabularForm::INPUT_HIDDEN_STATIC],
                'name'=>['label'=>'Book Name'],
                'details'=>[
                    'type'=>TabularForm::INPUT_RAW, 
                    'staticValue' => function($m, $k, $i, $w) { 
                        return 'Details for book ' . ($k + 1);
                    }, 
                    'value' => function($m, $k, $i, $w) { 
                        return Html::textInput("details", 'Details for book ' . ($k + 1), ['class'=>'form-control']);
                    }
                ],
                'publish_date'=>['label'=>'Published On', 'type'=>TabularForm::INPUT_STATIC],
            ],
            
            // configure other gridview settings
            'gridSettings'=>[
                'panel'=>[
                    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Manage Books</h3>',
                    'type'=>GridView::TYPE_PRIMARY,
                    'before'=>false,
                    'footer'=>false,
                    'after'=>Html::button('<i class="glyphicon glyphicon-plus"></i> Add New', ['type'=>'button', 'class'=>'btn btn-success kv-batch-create']) . ' ' . 
                            Html::button('<i class="glyphicon glyphicon-remove"></i> Delete', ['type'=>'button', 'class'=>'btn btn-danger kv-batch-delete']) . ' ' .
                            Html::button('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['type'=>'button', 'class'=>'btn btn-primary kv-batch-save'])
                ],
            ]
        ]);
        echo Html::endForm();
    ?>
	
</div>