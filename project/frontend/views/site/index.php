<?php

use common\DTO\FilmImageDTO;
use common\models\FilmSession;

/** @var yii\web\View $this */
/** @var FilmSession[] $sessions */
/** @var FilmSession $session */

$this->title = 'Кинотеатр';
?>

<div class="row gx-5">
    <?php foreach ($sessions as $session): ?>
    <?php $imageDTO = FilmImageDTO::createFromModel($session->film) ?>
    <div class="col-4">
        <div class="p-3" style="backgroung-image: <?= $imageDTO->relativeFilePath ?>">
            <img src="<?= Yii::getAlias($imageDTO->relativeFilePath) ?>"  class="img-thumbnail" alt="<?= $session->film->title ?>">
            <p class="mb-0">Фильм: <?= $session->film->title ?></p>
            <p class="mb-0">Продолжительность: <?= $session->film->duration ?></p>
            <p class="mb-0">Стоимость: <?= $session->cost ?> ₽</p>
            <p class="mb-0">Начало: <?= $session->datetime ?></p>
            <p class="mb-0">Возрастное ограничение: <?= $session->film->age_rating ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
