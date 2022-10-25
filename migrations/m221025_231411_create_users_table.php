<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m221025_231411_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id_user' => $this->primaryKey(),
            'name' => $this->string(45)->notNull(),
            'surname' => $this->string(45)->notNull(),
            'gender' => $this->string(20),
            'phonenum' => $this->string(20)->notNull(),
            'location' => $this->string(20)->notNull(),
            'photo' => $this->string(2500)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
