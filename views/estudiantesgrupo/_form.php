<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Estudiantesgrupo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estudiantesgrupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkpersonal')->textInput() ?>

    <?= $form->field($model, 'fkgrupo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
