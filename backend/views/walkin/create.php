<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Walkin $model */

$this->title = 'Create Walkin';
$this->params['breadcrumbs'][] = ['label' => 'Walkins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="walkin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
