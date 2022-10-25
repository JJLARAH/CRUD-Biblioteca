<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_author}}`.
 */
class m221025_213839_create_book_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_author}}', [
            'id_author' => $this->primaryKey(),
            'name' => $this->string(45),
            'surname' => $this->string(45),
        ]);

        $this->batchInsert('book_author', ['name', 'surname'], [
            ['Unknow', 'Unknow'],
            ['Juan', 'Escutia'],
            ['Tsun', 'Tzu']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_author}}');
    }
}
