<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'priority')->dropDownList([
        'LOW' => 'Низкий',
        'MEDIUM' => 'Средний',
        'HIGH' => 'Высокий',
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        'PENDING' => 'В работе',
        'COMPLETED' => 'Завершено',
    ]) ?>

    <div>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
