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
        'layout' => "{items}\n{pager}",
        'tableOptions' => ['class' => 'table table-striped table-bordered'],
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'title',
                'value' => function($model) {
                    return mb_strlen($model->title) > 30 ? mb_substr($model->title, 0, 30) . '...' : $model->title;
                },
                'enableSorting' => false,
            ],
            [
                'attribute' => 'description',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'priority',
                'value' => function($model) {
                    return $model->getPriorityLabel();
                },
                'contentOptions' => function ($model) {
                    return [
                        'class' => 'text-center',
                        'style' => 'color: ' . (
                            $model->priority === 'LOW' ? 'green' : (
                            $model->priority === 'MEDIUM' ? 'orange' : 'red'
                            )
                            )
                    ];
                },
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return $model->getStatusLabel();
                },
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'created_at',
                'value' => function($model) {
                    return Yii::$app->formatter->asDatetime($model->created_at, 'dd.MM.yyyy HH:mm');
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действие',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>

</div>
