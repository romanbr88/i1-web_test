<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%model}}`.
 */
class m210630_204435_create_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%model}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'alias' => $this->string()->notNull()->unique(),
            'brand_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'FK_model_brand',
            'model',
            'brand_id',
            'brand',
            'id',
            'CASCADE'
        );

        $this->batchInsert('model', ['name', 'alias', 'brand_id'], [
            ['ES', 'es', 1],
            ['GX', 'gx', 1],
            ['Camry', 'camry', 2],
            ['Corolla', 'corolla', 2],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%model}}');

        $this->dropForeignKey('FK_model_brand', 'model');
    }
}
