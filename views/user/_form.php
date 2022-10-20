<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row g-3">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phonenum')->textInput() ?>

        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        <div class="col-sm-1">
            <?= Html::img($model->photo, ['width' => '240px']); ?>
        </div>

        <?= $form->field($model, 'image')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>