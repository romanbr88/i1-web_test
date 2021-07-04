<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%engine}}`.
 */
class m210630_205645_create_engine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%engine}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()->unique(),
            'alias' => $this->string()->notNull()->unique(),
        ]);

        $this->batchInsert('engine', ['type', 'alias'], [
            ['Бензин', 'petrol'],
            ['Дизель', 'diesel'],
            ['Гибрид', 'hybrid'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%engine}}');
    }
}
