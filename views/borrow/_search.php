<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BorrowSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="borrow-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_borrow') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_book') ?>

    <?= $form->field($model, 'date_borrow') ?>

    <?= $form->field($model, 'date_return') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
