<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Borrow $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="borrow-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_book')->textInput() ?>

    <?= $form->field($model, 'date_borrow')->textInput() ?>

    <?= $form->field($model, 'date_return')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
