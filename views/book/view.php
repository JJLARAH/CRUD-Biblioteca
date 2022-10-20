<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Book $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_book' => $model->id_book], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_book' => $model->id_book], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_book',
            [
                'label' => 'Cover',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img($data->cover, ['width' => '150px']);
                },
            ],
            'title',
            'pagecount',
            [
                'label'=>'Author',
                'value'=> $model->author->name.' '.$model->author->surname,
            ],
            [
                'label'=>'Genre',
                'value'=> $model->genre->genre,
            ],
        ],
    ]) ?>

</div>