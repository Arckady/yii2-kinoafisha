<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film_session}}`.
 */
class m250306_111548_create_film_session_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film_session}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer(),
            'datetime' => $this->dateTime()->comment('Время начала сеанса'),
            'cost' => $this->integer()->comment('Стоимость в копейках'),
        ]);

        $this->createIndex(
            'idx-session-film_id',
            '{{%film_session}}',
            'film_id'
        );

        $this->addForeignKey(
            'fk-post-film_id',
            '{{%film_session}}',
            'film_id',
            'film',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-post-film_id', '{{%film_session}}');
        $this->dropIndex('idx-session-film_id', '{{%film_session}}');
        $this->dropTable('{{%film_session}}');
    }
}
