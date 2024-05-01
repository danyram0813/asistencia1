<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Estudiantesgrupo $model */

$this->title = 'Create Estudiantesgrupo';
$this->params['breadcrumbs'][] = ['label' => 'Estudiantesgrupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantesgrupo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
