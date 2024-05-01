<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tipociclo $model */

$this->title = 'Create Tipociclo';
$this->params['breadcrumbs'][] = ['label' => 'Tipociclos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Administración</h6>
            </div>
                <div class="card-body">

                    <div class="tipociclo-create">

                        <h1><?= Html::encode($this->title) ?></h1>

                        <p>
                            <?= Html::a('<i class="fas fa-undo-alt"></i>', ['/tipociclo/index'], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fas fa-home"></i>', ['/site/index'], ['class' => 'btn btn-primary']) ?>
                        </p>

                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>

                    </div>

                </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Soporte y ayuda</h6>
            </div>
                <div class="card-body">

                    <div class="tipociclo-create">

                        <p>Para crear un nuevo tipo ciclo, primero rellene los campos y luego en la opción guardar.</p>

                    </div>

                </div>
        </div>
    </div>
    
</div>
