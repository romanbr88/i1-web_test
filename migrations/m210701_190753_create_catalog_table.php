<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catalog}}`.
 */
class m210701_190753_create_catalog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%catalog}}', [
            'id' => $this->primaryKey(),
            'model_id' => $this->integer()->notNull(),
            'engine_id' => $this->integer()->notNull(),
            'drive_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'FK_catalog_model',
            'catalog',
            'model_id',
            'model',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_catalog_engine',
            'catalog',
            'engine_id',
            'engine',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_catalog_drive',
            'catalog',
            'drive_id',
            'drive',
            'id',
            'CASCADE'
        );

        for ($i = 0; $i < 25; $i++) {
            $this->insert('catalog', [
                'model_id' => rand(1, 4),
                'engine_id' => rand(1, 3),
                'drive_id' => rand(1, 2),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%catalog}}');
    }
}
