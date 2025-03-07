<?php

namespace common\models;

use backend\behaviors\FilmBehavior;
use backend\models\FilmForm;
use common\DTO\FilmImageDTO;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;

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
    const UPLOAD_DIRECTORY = "@frontend/web/uploads/";

    public function behaviors(): array
    {
        return [
            FilmBehavior::class,
        ];
    }

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

    public function fillFromForm(FilmForm $form): void
    {
        $this->title = $form->title;
        $this->description = $form->description;
        $this->duration = $form->duration;
        $this->age_rating = $form->age_rating;
    }

    public function afterDelete(): void
    {
        parent::afterDelete();
        $imageDTO = FilmImageDTO::createFromModel($this);
        FileHelper::unlink(\Yii::getAlias($imageDTO->filePath));
    }
}
