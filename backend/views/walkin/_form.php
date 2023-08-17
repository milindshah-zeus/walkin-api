<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Walkin $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="walkin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'walkin_id')->textInput() ?>

    <?= $form->field($model, 'role_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_Date')->textInput() ?>

    <?= $form->field($model, 'end_Date')->textInput() ?>

    <?= $form->field($model, 'expiry_Date')->textInput() ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_roles')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slots')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instructions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'system_requirements')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'walk_in_process')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'modified')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
