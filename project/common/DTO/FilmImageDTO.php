<?php

namespace common\DTO;

use common\models\Film;
use yii\web\UploadedFile;

class FilmImageDTO
{
    private function __construct(
        public string $extension,
        public ?string $absFilePath = null,
        public ?string $relativeFilePath = null,
        public ?int $id = null,
        public ?UploadedFile $file = null
    )
    {}

    public static function createFromModel(Film $film): self
    {
        return new self(
            $film->image_extension,
            absFilePath: $film::UPLOAD_DIRECTORY . $film->id . '.' . $film->image_extension,
            relativeFilePath: $film::IMAGE_PATH . $film->id . '.' . $film->image_extension,
            id: $film->id
        );
    }

    public static function createFromFile (UploadedFile $file): self
    {
        return new self(
            $file->extension,
            file: $file
        );
    }

    public function saveFile(Film $model): void
    {
        $this->file->saveAs($model::UPLOAD_DIRECTORY . $model->id . "." . $this->extension);
    }
}
