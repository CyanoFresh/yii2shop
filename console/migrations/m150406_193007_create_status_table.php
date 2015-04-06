<?php

use yii\db\Schema;
use yii\db\Migration;

class m150406_193007_create_status_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%status}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'color' => Schema::TYPE_STRING . ' NOT NULL',
            'background' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%status}}');
    }
}
