<?php

use common\models\JobRole;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Job Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-role-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Job Role', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'role_id',
            'role_name',
            'compensation',
            'role_description:ntext',
            'requirements:ntext',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, JobRole $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'role_id' => $model->role_id]);
                 }
            ],
        ],
    ]); ?>


</div>
