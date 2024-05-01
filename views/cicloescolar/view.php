<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Cicloescolar $model */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cicloescolars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Administración</h6>
            </div>
                <div class="card-body">

                <div class="cicloescolar-view">

                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                            <?= Html::a('<i class="fas fa-undo-alt"></i>', ['/cicloescolar/index'], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fas fa-home"></i>', ['/site/index'], ['class' => 'btn btn-primary']) ?>
                    </p>

                    <p>
                        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary',]) ?>
                        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'ID',
                            'clave',
                            'nombre',
                            'vigente',
                            'fktipociclo',
                        ],
                    ]) ?>

                </div>

                </div>
        </div>
    </div>
</div>

