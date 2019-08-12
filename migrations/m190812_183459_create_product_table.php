<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m190812_183459_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
			'category_id' => $this->integer(),
            'name' => $this->string(),
			'price' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
