<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cicloescolar $model */

$this->title = 'Create Cicloescolar';

?>
<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Administración</h6>
            </div>
                <div class="card-body">

                    <div class="cicloescolar-create">

                    

                        

                        <?= $this->renderAjax('_form', [
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
