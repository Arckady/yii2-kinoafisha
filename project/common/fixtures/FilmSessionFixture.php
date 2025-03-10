<?php

namespace common\fixtures;

use yii\test\ActiveFixture;

class FilmSessionFixture extends ActiveFixture
{
    public $modelClass = 'common\models\FilmSession';
    public $dataFile = '@common/tests/_data/film_session.php';
}