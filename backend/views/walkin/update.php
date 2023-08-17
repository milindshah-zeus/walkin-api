<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Walkin $model */

$this->title = 'Update Walkin: ' . $model->walkin_id;
$this->params['breadcrumbs'][] = ['label' => 'Walkins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->walkin_id, 'url' => ['view', 'walkin_id' => $model->walkin_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="walkin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
