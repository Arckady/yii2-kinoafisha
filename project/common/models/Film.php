<?php

namespace common\models;

use yii\db\ActiveRecord;

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
class Film extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['duration', 'age_rating'], 'default', 'value' => null],
            [['title', 'image_extension', 'description'], 'required'],
            [['title', 'description'], 'filter', 'filter' => 'strip_tags'],
            [['description'], 'string'],
            [['duration', 'age_rating'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image_extension'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
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
