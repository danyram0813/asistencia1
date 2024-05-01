<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Materia $model */
/** @var yii\widgets\ActiveForm $form */
?>



                <div class="materia-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'fkcarrera')->textInput() ?>

                    <?= $form->field($model, 'fkplan')->textInput() ?>

                    <?= $form->field($model, 'semestre')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                


                </div>

            

