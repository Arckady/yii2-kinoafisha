<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "film_session".
 *
 * @property int $id
 * @property int|null $film_id
 * @property string|null $datetime Время начала сеанса
 * @property int|null $cost Стоимость в копейках
 *
 * @property Film $film
 */
class FilmSession extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'datetime', 'cost'], 'default', 'value' => null],
            [['film_id', 'cost'], 'integer'],
            [['datetime'], 'safe'],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::class, 'targetAttribute' => ['film_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'film_id' => 'Film ID',
            'datetime' => 'Время начала сеанса',
            'cost' => 'Стоимость в копейках',
        ];
    }

    /**
     * Gets query for [[Film]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::class, ['id' => 'film_id']);
    }

}
