<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Borrow $model */

$this->title = 'Update Borrow: ' . $model->id_borrow;
$this->params['breadcrumbs'][] = ['label' => 'Borrows', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_borrow, 'url' => ['view', 'id_borrow' => $model->id_borrow]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="borrow-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
