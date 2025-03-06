<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\FilmSession $model */

$this->title = 'Create Film Session';
$this->params['breadcrumbs'][] = ['label' => 'Film Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-session-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
