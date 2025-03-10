<?php

use common\models\FilmSession;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\FilmSession $model */

$this->title = $model->film->title;
$this->params['breadcrumbs'][] = ['label' => 'Киносеансы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="film-session-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'film_id',
                'label' => 'Фильм',
                'value' => function (FilmSession $model) {
                    return $model->film->title;
                }
            ],
            'datetime',
            'cost',
        ],
    ]) ?>

</div>
