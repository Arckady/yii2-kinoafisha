<?php

use common\models\Film;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\FilmSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Фильмы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать фильм', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                'id',
            'title',
            [
                'attribute' => 'image',
                'label' => 'Изображение',
                'value' => function(Film $model) {
                    $imagePath = \Yii::$app->urlManagerFrontend->createUrl('uploads') . '/' . $model->id . "." . $model->image_extension;
                    return '<img src="' . $imagePath . '" style="width: 50px" alt="Фото">';
                },
                'format' => 'html'
            ],
            'description:ntext',
            'duration',
            'age_rating',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Film $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
