<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->title;
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><?= Html::encode($this->title) ?></h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h4 class="card-subtitle mb-2">Название:</h4>
                <p class="card-text"><?= Html::encode($model->title) ?>
                <span class="badge bg-secondary"><?= $model->getPriorityLabel() ?></span>
                <span class="badge bg-info"><?= $model->getStatusLabel() ?></span>
                </p>
            </div>

            <div class="mb-3">
                <h4 class="card-subtitle mb-2">Описание:</h4>
                <p class="card-text"><?= Html::encode($model->description) ?></p>
            </div>
            <div class="d-flex justify-content-between">
                <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
</div>

