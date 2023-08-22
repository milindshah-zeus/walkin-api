<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\JobRole $model */

$this->title = 'Create Job Role';
$this->params['breadcrumbs'][] = ['label' => 'Job Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-role-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
