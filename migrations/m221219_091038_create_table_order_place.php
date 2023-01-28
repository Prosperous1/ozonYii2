<?php

use yii\db\Migration;

class m221219_091038_create_table_order_place extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%address}}',
            [
                'id' => $this->primaryKey(),
                'city_id' => $this->integer()->notNull(),
                'street' => $this->string(100)->notNull(),
                'house' => $this->integer()->notNull(),
                'apartment' => $this->integer()->notNull(),
                'description' => $this->text()->notNull(),
                'user_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('city_id', '{{%address}}', ['city_id']);
        $this->createIndex('user_id', '{{%address}}', ['user_id']);

        $this->addForeignKey(
            'address_ibfk_1',
            '{{%address}}',
            ['city_id'],
            '{{%city}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'address_ibfk_2',
            '{{%address}}',
            ['user_id'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%address}}');
    }
}
