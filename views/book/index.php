<?php

use app\models\Book;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Author', ['author/create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_book',
            [
                'label' => 'Cover',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img($data->cover, ['width' => '80px']);
                },
            ],
            'title',
            'pagecount',
            [
                'attribute' => 'author',
                'value' => function ($model) {
                    return $model->author->name . ' ' . $model->author->surname;
                }
            ],
            [
                'attribute' => 'genre',
                'value' => 'genre.genre'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Book $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_book' => $model->id_book]);
                }
            ],
        ],
    ]); ?>


</div>