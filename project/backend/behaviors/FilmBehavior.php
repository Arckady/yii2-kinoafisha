<?php

namespace backend\behaviors;

use common\models\Film;
use yii\base\Behavior;
use yii\db\BaseActiveRecord;
use yii\helpers\FileHelper;

class FilmBehavior extends Behavior
{
    public function events(): array
    {
        return [
            BaseActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
        ];
    }

    public function beforeUpdate($event): void
    {
        $model = $this->owner;
        if ($model instanceof Film) {
            $oldFile = \Yii::getAlias($model::UPLOAD_DIRECTORY . $model->id . '.' . $model->getOldAttribute('image_extension'));
            FileHelper::unlink($oldFile);
        }
    }
}