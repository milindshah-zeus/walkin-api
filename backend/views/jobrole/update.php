<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\JobRole $model */

$this->title = 'Update Job Role: ' . $model->role_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->role_id, 'url' => ['view', 'role_id' => $model->role_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
