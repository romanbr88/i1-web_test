<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%drive}}`.
 */
class m210630_205937_create_drive_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%drive}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()->unique(),
            'alias' => $this->string()->notNull()->unique(),
        ]);

        $this->batchInsert('drive', ['type', 'alias'], [
            ['Полный', 'full'],
            ['Передний', 'front'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%drive}}');
    }
}
