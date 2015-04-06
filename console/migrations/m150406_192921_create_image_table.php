<?php

use yii\db\Schema;
use yii\db\Migration;

class m150406_192921_create_image_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => Schema::TYPE_PK,
            'model_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
