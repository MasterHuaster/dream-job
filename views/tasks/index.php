<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мой To-Do лист';
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать задачу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'emptyText' => 'Нет записей',
        'columns' => [
            'id',
            'Название',
            'Описание',
            'Приоритет',
            'Статус',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
