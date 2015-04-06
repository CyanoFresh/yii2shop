<?php

use yii\db\Schema;
use yii\db\Migration;

class m150406_192938_create_order_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => Schema::TYPE_PK,
            'status' => Schema::TYPE_INTEGER . ' NOT NULL',
            'total_cost' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date' => Schema::TYPE_DATETIME . ' NOT NULL',
            'data' => Schema::TYPE_TEXT,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'phone' => Schema::TYPE_STRING . ' NOT NULL',
            'message' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
