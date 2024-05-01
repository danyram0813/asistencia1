<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Estudiantesgrupo $model */

$this->title = 'Update Estudiantesgrupo: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantesgrupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiantesgrupo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
