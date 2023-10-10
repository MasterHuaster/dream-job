<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мой To-Do лист';
?>
<div class="container-fluid">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-9">
            <form class="d-flex">
                <?= Html::textInput('fultext', $fultext, ['class' => 'form-control me-2', 'placeholder' => 'Описание/Название']) ?>


                <?= Html::dropDownList('priority', $priority, array_merge(['' => 'Не выбрано'], app\models\Task::PRIORITY), ['class' => 'form-control me-2']) ?>

                <?= Html::dropDownList('status', $status, array_merge(['' => 'Не выбрано'], app\models\Task::STATUSES), ['class' => 'form-control me-2']) ?>
                <button type="submit" class="btn btn-primary">Искать</button>
                <?= Html::a(
                    file_get_contents(Yii::getAlias('@webroot/svg/x-circle.svg')),
                    ['index'],
                    ['class' => 'btn btn-light ms-1', 'title' => 'Сбросить фильтр']
                ) ?>

            </form>
        </div>

        <div class="col-md-3 text-end">
            <?= Html::a('Создать задачу', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <div class="mt-4">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'emptyText' => 'Нет записей',
            'layout' => "{items}\n{pager}",
            'tableOptions' => ['class' => 'table table-striped table-bordered'],
            'pager' => [
                'class' => 'yii\bootstrap5\LinkPager',
                'firstPageLabel' => 'Первая',
                'lastPageLabel'  => 'Последняя',
                'nextPageLabel'  => '>>',
                'prevPageLabel'  => '<<',
                'options' => [
                    'class' => 'pagination justify-content-center',
                ],
            ],
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
                    'value' => function($model) {
                        return mb_strlen($model->title) > 40 ? mb_substr($model->title, 0, 40) . '...' : $model->title;
                    },
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
</div>

