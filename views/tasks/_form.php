<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'priority')->dropDownList([
        'LOW' => 'LOW',
        'MEDIUM' => 'MEDIUM',
        'HIGH' => 'HIGH',
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        'PENDING' => 'PENDING',
        'COMPLETED' => 'COMPLETED',
    ]) ?>

    <div>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
