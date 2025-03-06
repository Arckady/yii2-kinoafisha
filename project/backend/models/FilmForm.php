<?php

namespace backend\models;

use common\models\Film;
use Yii;
use yii\base\Model;
use yii\db\Exception;
use yii\web\UploadedFile;

/**
 * @property string $title
 * @property string $imageFile Файл изображения
 * @property string $description
 * @property int|null $duration Продолжительность
 * @property int|null $age_rating Возрастное огранечение
 */

class FilmForm extends Model
{
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

    public function saveAndReturnModel(): Film
    {
        $model = new Film();

        $model->title = $this->title;
        $model->duration = $this->duration;
        $model->description = $this->description;
        $model->age_rating = $this->age_rating;
        $file = UploadedFile::getInstance($this, 'imageFile');
        $model->image_extension = $file->extension;

        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model->save();
            $file->saveAs('@frontend/web/uploads/' . $model->id . '.' . $file->extension);
            $transaction->commit();
        } catch(Exception) {
            $transaction->rollBack();
        }

        return $model;
    }
}