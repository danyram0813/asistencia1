<?php

use app\models\Materia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use app\components\Util;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var app\models\search\MateriaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Materias';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Administración</h6>
            </div>
                <div class="card-body">

                    <div class="materia-index">

                        <h1><?= Html::encode($this->title) ?></h1>

                        <p>
                            <?= Html::a('<i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-primary']) ?>
                            <?php 
                                echo Html::button('<i class="fa fa-plus"></i>', 
                                ['value'=>Url::to(['materia/create']),
                                                'class' => 'btn btn-outline-primary btn-sm','id'=>'ventana']) 
                            ?>
                            <?= Html::a('<i class="fas fa-home"></i>', ['/site/index'], ['class' => 'btn btn-primary']) ?>
                        </p>

                        <?php
                            Modal::begin([
                                'title' =>'<h4>Materia</h4>',
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
                                'attribute' => 'nombre',
                                'header' => 'NOMBRE',
                            ],
                            [
                                'attribute' => 'fkcarrera',
                                'header' => 'FKCARRERA',
                            ],
                            [
                                'attribute' => 'fkplan',
                                'header' => 'FKPLAN',
                            ],
                            [
                                'attribute' => 'semestre',
                                'header' => 'SEMESTRE',
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
                                    'attribute' => 'nombre',
                                    'header' => 'Nombre',
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                    'width' => '15%',
                                ],
                                [
                                    'attribute' => 'fkcarrera',
                                    'header' => 'Fkcarrera',
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                    'width' => '10%',
                                ],
                                [
                                    'attribute' => 'fkplan',
                                    'header' => 'Fkplan',
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                    'width' => '10%',
                                ],
                                [
                                    'attribute' => 'semestre',
                                    'header' => 'Semestre',
                                    'vAlign' => 'middle',
                                    'hAlign' => 'left',
                                    'width' => '10%',
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
                                            return Html::a(' <i class="fa fa-fw fa-eye"></i>', ['view', 'ID' =>  $dataProvider->ID], ['class' => 'btn btn-outline-primary btn-sm']);
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
                                            return Html::a(' <i class="fa fa-fw fa-pen"></i>', ['update', 'ID' =>  $dataProvider->ID], ['class' => 'btn btn-outline-primary btn-sm']);
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

                            <?= GridView::widget([
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

