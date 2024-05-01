<?php
use app\models\TuCicloescolar;
use yii\helpers\Html;
use kartik\grid\GridView;
use app\components\Util;
use kartik\grid\ActionColumn;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\search\TucicloescolarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ciclo escolar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
	
    <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        <?= $this->title ?>
                    </div>
                <div class="card-body">


<div class="tu-cicloescolar-index">


    <p>
        <?php 
                    echo Html::button('<i class="fa fa-plus"></i>', 
                    ['value'=>Url::to(['tucicloescolar/create']),
                                    'class' => 'btn btn-outline-primary btn-sm','id'=>'modalButton']) 
                    ?>
    </p>

    <?php
        Modal::begin([
            'title' =>'<h4>Ciclo escolar</h4>',
            'id'     =>'movi-modal',
            'size'   =>'modal-lg',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
            ]);
            echo "<div id='movi-modalContent'> </div>";
        Modal::end();
    ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <?php
                            $gridColumns = [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => 'nombre',
                                    'header' => 'Nombre',
                                    'vAlign' => 'middle',
                                ],
                                [
                                    'attribute' => 'nombre_largo',
                                    'header' => 'nombre_largo',
                                    'vAlign' => 'middle',
                                ],
                                [
                                    'attribute' => 'fecha_inicio',
                                    'header' => 'Fecha Inicio',
                                    'vAlign' => 'middle',
                                    'content' => function ($model) {
                                        return Yii::$app->formatter->asDate($model->fecha_inicio, 'long');
                                    }
                                ],
                                [
                                    'attribute' => 'fecha_fin',
                                    'header' => 'Fecha Fin',
                                    'vAlign' => 'middle',
                                    'content' => function ($model) {
                                        return Yii::$app->formatter->asDate($model->fecha_fin, 'long');
                                    }
                                ],
                                [
                                    'attribute' => 'fk_estatus',
                                    'header' => 'Estatus',
                                    'vAlign' => 'middle',
                                    'value' => 'fkEstatus.nombre',
                                ],

                                /* [
                                    'attribute' => 'cur_activaparaadministrar',
                                    'header' => 'Administra',
                                    'vAlign' => 'middle',
                                    'value' => function ($model) {
                                        return ($model->cur_activaparaadministrar === 1) ? 'SI' : 'NO';
                                    }
                                ], */
 
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'template' => '{ver}',
                                    'header' => 'Ver',
                                    'buttons' => [
                                        'ver' => function ($url, $dataProvider) {
                                            return Html::button('<i class="fa fa-fw fa-eye"></i>', 
                                                     ['value'=>Url::to(['tucicloescolar/view', 'ID'=> Util::encrypt_decryptID($dataProvider->ID,1)]), 
                                                      'class' => 'btn btn-outline-primary btn-sm custom_button'
                                                     ]);
                                        },
                                    ],
                                ],
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'template' => '{actualizar}',
                                    'header' => 'Modificar',
                                    'buttons' => [
                                        'actualizar' => function ($url, $dataProvider) {
                                        return Html::button('<i class="fa fa-fw fa-pen"></i></span>', 
                                        ['value'=>Url::to(['tucicloescolar/update', 'ID'=> Util::encrypt_decryptID($dataProvider->ID,1)]),
                                        'class' => 'btn btn-outline-primary btn-sm custom_button'
                                        ]);
                                        },
                                    ],
                                ],
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'template' => '{borrar}',
                                    'header' => 'Eliminar',
                                    'buttons' => [
                                        'borrar' => function ($url, $dataProvider) {
                                            return Html::a('<i class="fa fa-fw fa-trash"></i>', ['delete', 'ID' => Util::encrypt_decryptId($dataProvider->ID, 1)], [
                                                'class' => 'btn btn-outline-primary btn-sm',
                                                'data' => [
                                                    'confirm' => Yii::t('app', 'Seguro de borrar este registro?'),
                                                    'method' => 'post',
                                                ],
                                            ]);
                                        },
                                    ],
                                ],
                                
                            ]

                            ?>

<?php Pjax::begin(); ?> 
            <?=   GridView::widget([
            'dataProvider'=> $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => $gridColumns,
            'responsive'=>true,
            'hover'=>true,
            'bordered'=>true,
            /*'pjax' => true,
            'pjaxSettings' =>[
                'neverTimeout'=>true,
                'options'=>[
                  'id'=>'grid-eval',
                ]
              ],*/
            //'resizableColumns'=>true,
            'headerRowOptions'=>['style'=>'font-size: .8em;background-color:#E6E6E6;color:#31708f'],
            'rowOptions' => ['style'=>'font-size: .9em;color:#000000;'],
            'panel' => [
                        'heading'=>'<h3 style="color:white;text-align:center">CICLOS</h3>',
                        'type'=>'primary',
                        'footer'=>false,
                        'before'=>false,
                            ],
                ]);
            ?>
             <?php Pjax::end(); ?>

             </div> <!-- center -->

</div> <!-- card body -->
</div> <!-- card shadow-->

</div><!-- columna col-lg-->



</div> <!-- row -->
</div> <!-- container-->
<?php
$js = <<<JAVASCRIPT
        $(function(){
                $('#modalButton').click(function(){
                    
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
