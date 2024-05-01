<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cicloescolar $model */

$this->title = 'Create Cicloescolar';
$this->params['breadcrumbs'][] = ['label' => 'Cicloescolars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cicloescolar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
