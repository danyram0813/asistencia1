<?php

use app\models\Tipociclo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\TipocicloSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipociclos';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- tarjeta -->
<div class="col-lg-12 mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Administración</h6>
        </div>
        <div class="card-body">

<div class="tipociclo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipociclo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    

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
                                    'attribute' => 'mes',
                                    'header' => 'MES',
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
                            <?php
                           /*  echo ExportMenu::widget([
                                'dataProvider' => $dataProvider,
                                'columns' => $gridColumnsExcel,
                                'dropdownOptions' => [
                                    'label' => 'Exportar Todo',
                                    'class' => 'btn btn-outline-secondary'
                                ]
                            ]);  */
                            ?>
                            <?= GridView::widget([
                                'dataProvider' => $dataprovider,
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
