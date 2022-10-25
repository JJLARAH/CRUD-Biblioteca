<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m221025_221906_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id_book' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'pagecount' => $this->integer(6)->notNull(),
            'id_author' => $this->integer()->notNull(),
            'id_genre' => $this->integer()->notNull(),
            'cover' => $this->string(2500),
        ]);

        // creates index for column `id_author`
        $this->createIndex(
            'fk_author_idx',
            'books',
            'id_author'
        );

        // add foreign key for table `book_author`
        $this->addForeignKey(
            'fk_author',
            'books',
            'id_author',
            'book_author',
            'id_author',
            'no action',
            'no action'
        );

        // creates index for column `id_genre`
        $this->createIndex(
            'fk_genre_idx',
            'books',
            'id_genre'
        );

        // add foreign key for table `book_genre`
        $this->addForeignKey(
            'fk_genre',
            'books',
            'id_genre',
            'book_genre',
            'id_genre',
            'no action',
            'no action'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // drops foreign key for table `book_author`
        $this->dropForeignKey(
            'fk_author',
            'books'
        );

        // drops index for column `id_author`
        $this->dropIndex(
            'fk_author_idx',
            'books'
        );

        // drops foreign key for table `book_genre`
        $this->dropForeignKey(
            'fk_genre',
            'books'
        );

        // drops index for column `id_genre`
        $this->dropIndex(
            'fk_genre_idx',
            'books'
        );

        $this->dropTable('{{%books}}');
    }
}
