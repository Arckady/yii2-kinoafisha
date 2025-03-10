<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
class FilmSession extends ActiveRecord
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
    public function rules(): array
    {
        return [
            [['film_id', 'datetime', 'cost'], 'required'],
            [['film_id', 'cost'], 'integer'],
            [['datetime'], 'validateDatetime'],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::class, 'targetAttribute' => ['film_id' => 'id']],
        ];
    }

    public function validateDatetime($attribute, $params)
    {
        $sessionBegin =  new \DateTimeImmutable($this->$attribute);
        $sessionEnd = $sessionBegin->modify('+' . $this->film->duration . ' minutes');
        $timeLockFrom = $sessionBegin->modify('-30 minutes')->format('Y-m-d H:i:s');
        $timeLockTo = $sessionEnd->modify('+30 minutes')->format('Y-m-d H:i:s');
        $sessionInInterval = self::find()->where(['between', 'datetime', $timeLockFrom, $timeLockTo])->one();
        if ($sessionInInterval) {
            $this->addError($attribute, 'Наложение по времени с другим сеансом');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'film_id' => 'Фильм',
            'datetime' => 'Время начала сеанса',
            'cost' => 'Стоимость, ₽',
        ];
    }

    /**
     * Gets query for [[Film]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilm(): ActiveQuery
    {
        return $this->hasOne(Film::class, ['id' => 'film_id']);
    }

    public static function getArrayFilms(): array
    {
        return Film::find()->select(['title', 'id'])->indexBy('id')->column();
    }

    public function afterFind(): void
    {
        parent::afterFind();
        $this->cost /= 100;
    }

    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $this->cost *= 100;
        return true;
    }
}
