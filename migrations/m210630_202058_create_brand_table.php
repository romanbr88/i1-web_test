<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brand}}`.
 */
class m210630_202058_create_brand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%brand}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'alias' => $this->string()->notNull()->unique(),
        ]);

        $this->batchInsert('brand', ['name', 'alias'], [
            ['Lexus', 'lexus'],
            ['Toyota', 'toyota'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%brand}}');
    }
}
