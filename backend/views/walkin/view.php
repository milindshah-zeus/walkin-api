<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Walkin $model */

$this->title = $model->walkin_id;
$this->params['breadcrumbs'][] = ['label' => 'Walkins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="walkin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'walkin_id' => $model->walkin_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'walkin_id' => $model->walkin_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'walkin_id',
            'role_type',
            'start_Date',
            'end_Date',
            'expiry_Date',
            'location',
            'job_roles',
            'remarks',
            'slots',
            'instructions:ntext',
            'system_requirements:ntext',
            'walk_in_process:ntext',
            'created',
            'modified',
        ],
    ]) ?>

</div>
