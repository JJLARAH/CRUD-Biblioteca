<?php

use app\models\Borrow;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Borrow $model */
/** @var app\models\BorrowSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Borrows History for user: ' . ' ' . $_GET['id_user'];
$this->params['breadcrumbs'][] = ['label' => 'Borrows', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'History';
?>
<div class="borrow-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Borrow', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_borrow',
            [
                'attribute' => 'user',
                'value' => function ($model) {
                    return $model->user->name . ' ' . $model->user->surname;
                }
            ],
            [
                'attribute' => 'book',
                'value' => 'book.title'
            ],
            'date_borrow',
            'date_return',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Borrow $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_borrow' => $model->id_borrow]);
                 }
            ],
        ],
    ]); ?>


</div>
