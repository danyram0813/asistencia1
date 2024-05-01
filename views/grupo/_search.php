<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\GrupoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="grupo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'clave') ?>

    <?= $form->field($model, 'fkmateria') ?>

    <?= $form->field($model, 'fkperiodo') ?>

    <?= $form->field($model, 'fkpersonal') ?>

    <?php // echo $form->field($model, 'horaInicio') ?>

    <?php // echo $form->field($model, 'horaFin') ?>

    <?php // echo $form->field($model, 'dias') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
