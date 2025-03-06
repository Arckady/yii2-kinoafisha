<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "film".
 *
 * @property int $id
 * @property string $title
 * @property string $image_extension Расширение файла изображения
 * @property string $description
 * @property int|null $duration Продолжительность
 * @property int|null $age_rating Возрастное огранечение
 */
class Film extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['duration', 'age_rating'], 'default', 'value' => null],
            [['title', 'image_extension', 'description'], 'required'],
            [['description'], 'string'],
            [['duration', 'age_rating'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image_extension'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'image_extension' => 'Расширение файла изображения',
            'description' => 'Описание',
            'duration' => 'Продолжительность',
            'age_rating' => 'Возрастное огранечение',
        ];
    }

}
