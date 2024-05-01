<?php

use app\models\Tipociclo;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Cicloescolar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            
                <div class="card-body">

                <div class="cicloescolar-form">

                

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>


                    <?= $form->field($model, 'vigente',
                        ['template' => '
                        <label class="form-label mb-2 text-5"> VIGENTE</label>
                            {input}
                        {error}',
                        'inputOptions' => [
                        'class'=>'form-control',
                        ]] 
                        )->dropDownList([0 => 'NO VIGENTE', 1 => 'VIGENTE']) ?>


                    <?= $form->field($model,'fktipociclo',
                            [
                                'template' => '
                                <label class="form-label mb-2 text-5 text-primary"> Categoría</label>
                                {input}
                                {error}',
                                'inputOptions' => [
                                    'class' => 'form-select form-control h-auto',
                                ]
                            ]
                        )->dropDownList(
                            ArrayHelper::map(
                                Tipociclo::find()->all(),
                                'ID',
                                'nombre'
                            ),
                            ['prompt' => 'Seleccione una Categoría','onchange' => 
                            '
                            var valor=$(this).val();
                            if(valor==1){
                                //$("#profesion").html("Programa de estudios que cursa");
                                alert("1");
                            }else if(valor==2 || valor==3){
                                //$("#profesion").html("Cargo que desempeña");
                                alert("2");
                            }else if(valor==4){
                                //$("#profesion").html("Programa de estudios que cursa");
                                alert("3");
                            }
                            ']
                        ) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

                </div>
        </div>
    </div>
</div>


