<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Grupo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="grupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkmateria')->textInput() ?>

    <?= $form->field($model, 'fkperiodo')->textInput() ?>

    <?= $form->field($model, 'fkpersonal')->textInput() ?>

    <?= $form->field($model, 'horaInicio')->textInput() ?>

    <?= $form->field($model, 'horaFin')->textInput() ?>

    <?= $form->field($model, 'dias')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
