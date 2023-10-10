<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->name;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>

    <div>
        <strong>Name:</strong> <?= Html::encode($model->name) ?><br>
        <strong>Description:</strong> <?= Html::encode($model->description) ?><br>
        <strong>Priority:</strong> <?= Html::encode($model->priority) ?><br>
        <strong>Status:</strong> <?= Html::encode($model->status) ?><br>
    </div>
</div>
