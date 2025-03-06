<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film}}`.
 */
class m250306_103234_create_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'image_extension' => $this->string(10)->notNull()->comment('Расширение файла изображения'),
            'description' => $this->text()->notNull(),
            'duration' => $this->integer(4)->comment('Продолжительность в минутах'),
            'age_rating' => $this->integer(2)->comment('Возрастное огранечение'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%film}}');
    }
}
