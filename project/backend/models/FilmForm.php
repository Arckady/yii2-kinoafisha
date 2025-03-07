<?php

namespace backend\models;

use common\DTO\FilmImageDTO;
use common\models\Film;
use Yii;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * @property int|null $id
 * @property string|null $title
 * @property string|null $imageFile Файл изображения
 * @property string|null $description
 * @property int|null $duration Продолжительность
 * @property int|null $age_rating Возрастное огранечение
 */

class FilmForm extends Model
{
    public ?int $id = null;
    public ?string $title = null;
    public ?string $imageFile = null;
    public ?string $description = null;
    public ?int $duration = null;
    public ?int $age_rating = null;

    public function rules(): array
    {
        return [
            [['duration', 'age_rating'], 'default', 'value' => null],
            [['title', 'description'], 'required'],
            [['title', 'description'], 'filter', 'filter' => 'strip_tags'],
            [['description'], 'string'],
            [['duration', 'age_rating'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif, jpeg, webp'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'title' => 'Заголовок',
            'imageFile' => 'Файл изображения',
            'description' => 'Описание',
            'duration' => 'Продолжительность',
            'age_rating' => 'Возрастное огранечение',
        ];
    }

    public function saveFilm(?int $id = null): void
    {
        $model = $id ? Film::findOne($id) : new Film();
        $model->fillFromForm($this);

        $imageDTO =  FilmImageDTO::createFromFile(UploadedFile::getInstance($this, 'imageFile'));
        $model->image_extension = $imageDTO->extension;

        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model->save();
            $imageDTO->saveFile($model);
            $transaction->commit();
        } catch(ErrorException) {
            $transaction->rollBack();
            throw new \Exception('Не удалось сохранить информацию о фильме', 500);
        }
    }

    public function fillForm(Film $model): void
    {
        $imageDTO =  FilmImageDTO::createFromModel($model);

        $this->title = $model->title;
        $this->description = $model->description;
        $this->duration = $model->duration;
        $this->age_rating = $model->age_rating;
        $this->imageFile = $imageDTO->id . '.' . $imageDTO->extension;
    }
}