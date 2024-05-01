<?php

use app\models\Periodo;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use app\components\Util;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Modal;
use app\assets\AppAsset;
use kartik\switchinput\SwitchInput;
use app\models\Cicloescolar;

AppAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\search\PeriodoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Periodos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Administración</h6>
            </div>
                <div class="card-body">

                    <div class="periodo-index">

                        <h1><?= Html::encode($this->title) ?></h1>

                        <p>
                            <?= Html::a('<i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-primary']) ?>
                            <?php 
                                echo Html::button('<i class="fa fa-plus"></i>', 
                                ['value'=>Url::to(['periodo/create']),
                                                'class' => 'btn btn-outline-primary btn-sm','id'=>'ventana']) 
                            ?>
                            <?= Html::a('<i class="fas fa-home"></i>', ['/site/index'], ['class' => 'btn btn-primary']) ?>
                        </p>

                        <?php
                            Modal::begin([
                                'title' =>'<h4>Periodo</h4>',
                                'id'     =>'movi-modal',
                                'size'   =>'modal-lg',
                                'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
                                ]);
                                echo "<div id='movi-modalContent'> </div>";
                            Modal::end();
                        ?>

                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <?php
                        $gridColumnsExcel = [
                            [
                                'attribute' => 'ID',
                                'header' => 'ID',
                            ],
                            [
                                'attribute' => 'clave',
                                'header' => 'CLAVE',
                            ],
                            [
                                'attribute' => 'nombre',
                                'header' => 'NOMBRE',
                            ],
                            [
                                'attribute' => 'vigente',
                                'header' => 'VIGENTE',
                            ],
                            [
                                'attribute' => 'fkciclo',
                                'header' => 'FKCICLO',
                            ],
                        
                        ]
                        ?>

                        <?php
                            $gridColumns = [
                                ['class' => 'kartik\grid\SerialColumn'],
                                [
                                    'attribute' => 'ID',
                                    'header' => 'ID',
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                    'width' => '10%',
                                ],
                                 /* [
                                    'attribute' => 'sol_curp',
                                    'header' => 'Curp',
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                    'format' => 'raw',
                                    'value' => function ($dataProvider, $key, $index, $widget) {
                                        $solicitudID =   Util::encrypt_decryptId($dataProvider->id, 1);
                                        return Html::a(
                                            $dataProvider->sol_curp,
                                            '#',
                                            ['title' => 'View author detail', 'onclick' => "mostrarModal('{$solicitudID}')"]
                                        );
                                    },
                                    'width' => '8%',
                                ], */
                                [
                                    'attribute' => 'clave',
                                    'header' => 'Clave',
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                    'width' => '15%',
                                ],
                            
                                [
                                    'attribute' => 'nombre',
                                    'header' => 'Nombre',
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                    'width' => '15%',
                                ],
                                [
                                    'attribute' => 'vigente',
                                    'header'=>'Vigente',
                                    'vAlign'=>'middle',
                                    'hAlign'=>'left',
                                    'format' => 'raw',
                                    'value' => function ($dataProvider) {
                                        return SwitchInput::widget(
                                            [
                                                'name' => 'vigente',
                                                'pluginEvents' => [
                                                    'switchChange.bootstrapSwitch' => "function(e){
                                                        confirmarCiclo($dataProvider->ID);
                                                    }"
                                                ],
                                        
                                                'pluginOptions' => [
                                                    'size' => 'normal',
                                                    'onColor' => 'success',
                                                    'offColor' => 'danger',
                                                    'onText' => 'SI',
                                                    'offText' => 'No'
                                                ],
                                                'value' => $dataProvider->vigente
                                            ]
                                        );
                                    }
                                ],
                                

                                [
                                    'attribute' => 'fkciclo',
                                    'width' => '200px',
                                    'value' => function ($model, $key, $index, $widget) {
                                        return $model->fkciclo0->nombre;
                                    },
                                    'filterType' => GridView::FILTER_SELECT2,
                                    'filter' => ArrayHelper::map(Cicloescolar::find()->orderBy('ID')->asArray()->all(), 'ID', 'nombre'),
                                    'filterWidgetOptions' => [
                                        'pluginOptions' => ['allowClear' => true],
                                    ],
                                    'filterInputOptions' => ['placeholder' => 'Todas'],
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                ], 
                            
                                
                               
                               /*  [
                                    'class' => 'kartik\grid\BooleanColumn',
                                    'attribute' => 'sol_confirmapago',
                                    'header' => 'Pago',
                                    'vAlign' => 'middle',
                                    'hAlign' => 'middle',
                                    'value' => 'sol_confirmapago',
                                ],

                                [
                                    'attribute' => 'sol_createdat',
                                    'header' => 'Fecha Solicitud',
                                    'vAlign' => 'middle',
                                    'content' => function ($model) {
                                        return Yii::$app->formatter->asDate($model->sol_createdat, 'long');
                                    }
                                ], */
                                /* [
                                    'attribute' => 'sol_fketapa',
                                    'width' => '200px',
                                    'value' => function ($model, $key, $index, $widget) {
                                        return $model->solFketapa->eta_nombre;
                                    },
                                    'filterType' => GridView::FILTER_SELECT2,
                                    'filter' => ArrayHelper::map(Etapa::find()->orderBy('id')->asArray()->all(), 'id', 'eta_nombre'),
                                    'filterWidgetOptions' => [
                                        'pluginOptions' => ['allowClear' => true],
                                    ],
                                    'filterInputOptions' => ['placeholder' => 'Todas'],
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                ], */
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'template' => '{ver}',
                                    'header' => 'View',
                                    'width' => '15px',
                                    'buttons' => [
                                        'ver' => function ($url, $dataProvider) {
                                            return Html::button('<i class="fa fa-fw fa-eye"></i>', 
                                                     ['value'=>Url::to(['periodo/view', 'ID'=> $dataProvider->ID]), 
                                                      'class' => 'btn btn-outline-primary btn-sm custom_button'
                                                     ]);
                                        },
                                    ],
                                ],
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'template' => '{actualizar}',
                                    'header' => 'Update',
                                    'width' => '15px',
                                    'buttons' => [
                                        'actualizar' => function ($url, $dataProvider) {
                                            return Html::button('<i class="fa fa-fw fa-pen"></i></span>', 
                                        ['value'=>Url::to(['periodo/update', 'ID'=> $dataProvider->ID]),
                                        'class' => 'btn btn-outline-primary btn-sm custom_button'
                                        ]);
                                        },
                                    ],
                                ],
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'template' => '{borrar}',
                                    'header' => 'Delete',
                                    'width' => '15px',
                                    'buttons' => [
                                        'borrar' => function ($url, $dataProvider) {
                                            return Html::a('<i class="fa fa-fw fa-trash"></i>', ['delete', 'ID' => $dataProvider->ID], [
                                                'class' => 'btn btn-outline-primary btn-sm',
                                                'data' => [
                                                    'confirm' => Yii::t('app', 'Seguro de borrar este registro?'),
                                                    'method' => 'post',
                                                ],
                                            ]);
                                        },
                                    ],
                                ]


                            ];


                            ?>
                            <div align="center">
                            <?php
                            echo ExportMenu::widget([
                                'dataProvider' => $dataProvider,
                                'columns' => $gridColumnsExcel,
                                'dropdownOptions' => [
                                    'label' => 'Exportar Todo',
                                    'class' => 'btn btn-outline-secondary'
                                ]
                            ]);  
                            ?>
                            </div>

                            <?php Pjax::begin(['id'=>'periodo-grid']); ?>

                                <?= GridView::widget([
                                    'id'=>'periodo-grid',
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => $gridColumns,
                                    'responsive' => true,
                                    'hover' => true,
                                    'bordered' => true,
                                    'resizableColumns' => true,
                                    'headerRowOptions' => ['style' => 'font-size: .8em;background-color:#E6E6E6;color:#31708f'],
                                    'rowOptions' => ['style' => 'font-size: .7em;color:#000000;'],
                                    'panel' => [
                                        'heading' => '<h3 style="color:white;text-align:center">SOLICITUD DE FICHAS</h3>',
                                        'type' => 'primary',
                                        'footer' => false,
                                        'before' => false,
                                    ],


                                ]);
                                ?>
                            <?php Pjax::end(); ?>

                         </div>
        </div>
    </div>
</div>

<?php
$js = <<<JAVASCRIPT
        $(function(){
                $('#ventana').click(function(){
                    
                    $('#movi-modal').modal('show')
                                .find('#movi-modalContent')
                                .load($(this).attr('value'));
                    });


                    $('.custom_button').click(function(){
                        $('#movi-modal').modal('show')
                                .find('#movi-modalContent')
                                .load($(this).attr('value'));
                        //dynamiclly set the header for the modal
                    });

            });

        JAVASCRIPT;
        $this->registerJs($js);
?>


