<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m190812_184044_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
			'parent_id' => $this->integer(),
			'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
