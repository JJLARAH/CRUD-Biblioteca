<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%borrows}}`.
 */
class m221025_231944_create_borrows_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%borrows}}', [
            'id_borrow' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'id_book' => $this->integer()->notNull(),
            'date_borrow' => $this->date()->notNull(),
            'date_return' => $this->date()
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            'fk_user_idx',
            'borrows',
            'id_user'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk_user',
            'borrows',
            'id_user',
            'users',
            'id_user',
            'no action',
            'no action'
        );

        // creates index for column `id_book`
        $this->createIndex(
            'fk_book_idx',
            'borrows',
            'id_book'
        );

        // add foreign key for table `books`
        $this->addForeignKey(
            'fk_book',
            'borrows',
            'id_book',
            'books',
            'id_book',
            'no action',
            'no action'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // drops foreign key for table `books`
        $this->dropForeignKey(
            'fk_book',
            'borrows'
        );

        // drops index for column `id_author`
        $this->dropIndex(
            'fk_book_idx',
            'borrows'
        );

        // drops foreign key for table `book_genre`
        $this->dropForeignKey(
            'fk_user',
            'borrows'
        );

        // drops index for column `id_genre`
        $this->dropIndex(
            'fk_user_idx',
            'borrows'
        );

        $this->dropTable('{{%borrows}}');
    }
}
