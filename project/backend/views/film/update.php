<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Film $model */
/** @var string|null $imagePath */

$this->title = 'Обновить фильм: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Фильмы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="film-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'imagePath' => $imagePath
    ]) ?>

</div>
