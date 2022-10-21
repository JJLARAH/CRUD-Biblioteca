<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use app\models\Users;
use app\models\Book;

/** @var yii\web\View $this */
/** @var app\models\Borrow $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="borrow-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row g-3">


        <?php $var = ArrayHelper::map(Users::find()
            ->all(), 'id_user', 'surname', 'name');
        ?>
        <?= $form->field($model, 'user')
            ->dropDownList($var, ['id_user' => 'Select User']);
        ?>

        <?php $var = ArrayHelper::map(Book::find()
            ->all(), 'id_book', 'title');
        ?>
        <?= $form->field($model, 'book')
            ->dropDownList($var, ['id_book' => 'Select Book']);
        ?>

        <?= $form->field($model, 'date_borrow')->textInput(['type'=>'date']) ?>

        <?= $form->field($model, 'date_return')->textInput(['type'=>'date']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    
</div>