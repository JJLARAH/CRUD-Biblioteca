<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Book $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row g-3">

        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title of the book', 'required' => '']) ?>

        <?= $form->field($model, 'pagecount')->textInput(['type' => 'number', 'maxlength' => true, 'placeholder' => 'Total number of pages', 'required' => '']) ?>

        <?= $form->field($model, 'id_author')->textInput(['type' => 'number', 'maxlength' => true, 'placeholder' => 'Author of the book', 'required' => '']) ?>

        <?= $form->field($model, 'id_genre')->textInput(['type' => 'number', 'maxlength' => true, 'placeholder' => 'Genre of the book', 'required' => '']) ?>

        <div class="col-sm-1">
            <?= Html::img($model->cover, ['width' => '240px']); ?>
        </div>

        <?= $form->field($model, 'image')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>