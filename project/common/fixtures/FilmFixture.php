<?php

namespace common\fixtures;

use yii\test\ActiveFixture;

class FilmFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Film';
    public $dataFile = '@common/tests/_data/film.php';
}