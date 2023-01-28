<?php

use yii\db\Migration;

class m221219_090853_create_table_card extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%card}}',
            [
                'id' => $this->primaryKey(),
                'number' => $this->integer()->notNull(),
                'date_end' => $this->date()->notNull(),
                'owner_name' => $this->string(40)->notNull(),
                'is_default' => $this->boolean()->notNull(),
                'user_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%card}}');
    }
}
