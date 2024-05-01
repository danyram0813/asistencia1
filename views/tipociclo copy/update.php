<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tipociclo $model */

$this->title = 'Update Tipociclo: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Tipociclos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Administración</h6>
            </div>
                <div class="card-body">

                    <div class="tipociclo-update">

                        <h1><?= Html::encode($this->title) ?></h1>

                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>

                </div>
        </div>
    </div>
</div>

