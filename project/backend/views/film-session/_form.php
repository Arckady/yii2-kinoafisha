<?php

use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\FilmSession $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="film-session-form" style="width: 30rem;">

    <?php $form = ActiveForm::begin([
        'id' => 'film-session-form',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'film_id')->widget(Select2::class, [
        'data' => $model::getArrayFilms(),
        'options' => ['placeholder' => 'Выбрать фильм ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'datetime')->widget(DateTimePicker::class, [
        'options' => ['placeholder' => 'Начало сеанса ...'],
        'language' => 'ru',
        'pluginOptions' => [
            'autoclose' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'cost', [
        'addon' => [
            'prepend' => ['content' => '₽', 'options'=>['class'=>'alert-success']],
            'append' => ['content' => '.00', 'options'=>['style' => 'font-family: Monaco, Consolas, monospace;']],
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
