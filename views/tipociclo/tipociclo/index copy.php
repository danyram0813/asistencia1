<?php

use app\models\Tipociclo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\TipocicloSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipociclos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
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

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                'ID',
                                'nombre',
                                'mes',
                                [
                                    'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, Tipociclo $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'ID' => $model->ID]);
                                    }
                                ],
                            ],
                        ]); ?>


                    </div>

                </div>
        </div>
    </div>
</div>
