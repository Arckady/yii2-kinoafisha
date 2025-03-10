<?php

use common\models\FilmSession;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Киносеансы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-session-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать киносеанс', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'film_id',
                'label' => 'Фильм',
                'value' => function ($model) {
                    return $model->film->title;
                }
            ],
            'datetime',
            'cost',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, FilmSession $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
