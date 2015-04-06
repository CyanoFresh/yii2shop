<?php

use yii\db\Schema;
use yii\db\Migration;

class m150406_192959_create_slide_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%slide}}', [
            'id' => Schema::TYPE_PK,
            'sortOrder' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'body' => Schema::TYPE_TEXT . ' NOT NULL',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%slide}}');
    }
}
