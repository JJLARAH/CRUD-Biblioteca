<?php

use app\models\Book;
use app\models\BookAuthor;
use app\models\BookGenre;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Book $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row g-3">

        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title of the book', 'required' => '']) ?>

        <?= $form->field($model, 'pagecount')->textInput(['type' => 'number', 'maxlength' => true, 'placeholder' => 'Total number of pages', 'required' => '']) ?>

        <?php $var = ArrayHelper::map(BookAuthor::find()
            ->all(), 'id_author', 'surname','name');
        ?>
        <?= $form->field($model, 'id_author')
            ->label('Author name')
            ->dropDownList($var, [
                'id_author' => 'Select Author',
                'onchange' => 'javascript:if ($(this).val() == 1 || $(this).val() == "Other") {
                    $("#place-holder, #field-size").show();                    
                     } else {                    
                    $("#place-holder, #field-size").hide();    
                      }'
                //Onchange para mostrar textInput cuando se seleccione campo "Other"
            ]);
        $form->field($model, 'id_author')->textInput(array('id' => 'place-holder', 'style' => 'display:none'));
        ?>

        <?php $var = ArrayHelper::map(BookGenre::find()
            ->all(), 'id_genre', 'genre');
        ?>
        <?= $form->field($model, 'id_genre',)
            ->label('Genre')
            ->dropDownList($var, ['id_genre' => 'Select Genre'])
        ?>

        <div class="col-sm-auto">
            <?= Html::img($model->cover, ['width' => '200px']); ?>
        </div>
        <div class="col-sm-auto">
            <?= $form->field($model, 'image')->fileInput() ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>


    </div>
    <?php ActiveForm::end(); ?>
</div>