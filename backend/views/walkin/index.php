<?php

use common\models\Walkin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Walkins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="walkin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Walkin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'walkin_id',
            'role_type',
            'start_Date',
            'end_Date',
            'expiry_Date',
            //'location',
            //'job_roles',
            //'remarks',
            //'slots',
            //'instructions:ntext',
            //'system_requirements:ntext',
            //'walk_in_process:ntext',
            //'created',
            //'modified',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Walkin $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'walkin_id' => $model->walkin_id]);
                 }
            ],
        ],
    ]); ?>


</div>
