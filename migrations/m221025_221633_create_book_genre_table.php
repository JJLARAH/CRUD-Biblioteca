<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_genre}}`.
 */
class m221025_221633_create_book_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_genre}}', [
            'id_genre' => $this->primaryKey(),
            'genre' => $this->string(45)->notNull(),
        ]);

        $this->batchInsert('book_genre', ['genre'], [
            ['Unknow'],
            ['Thriller'],
            ['Science'],
            ['Drama'],
            ['History'],
            ['Adventure'],
            ['Mystery'],
            ['Comic'],
            ['Sci-fi'],
            ['Fantasy'],
            ['Religion'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_genre}}');
    }
}
