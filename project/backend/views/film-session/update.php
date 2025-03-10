<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\FilmSession $model */

$this->title = 'Обновить киносеанс: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Киносеансы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="film-session-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
