<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Borrow $model */

$this->title = 'Borrow:'.' '.$model->id_borrow;
$this->params['breadcrumbs'][] = ['label' => 'Borrows', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_borrow, 'url' => ['view', 'id_borrow' => $model->id_borrow]];
\yii\web\YiiAsset::register($this);
?>
<div class="borrow-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_borrow' => $model->id_borrow], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_borrow' => $model->id_borrow], [
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
            'id_borrow',
            'id_user',
            [
                'label'=>'User' . ' ' . Html::a('User Borrows History', ['history', 'id_user' => $model->id_user], ['class' => 'btn btn-outline-success btn-sm']),
                'value'=> $model->user->name.' '.$model->user->surname,
            ],
            [
                'label'=>'Book',
                'value'=> $model->book->title,
            ],
            [
                'label' => 'Cover',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img($model->book->cover, ['width' => '100px']);
                },
            ],
            'date_borrow',
            'date_return',
        ],
    ]) ?>

</div>
