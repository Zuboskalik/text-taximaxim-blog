<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 * Has foreign keys to the tables:
 *
 * - `users`
 * - `category`
 */
class m190130_152640_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1),
            'title' => $this->string(),
            'body' => $this->text()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-posts-user_id',
            'posts',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-posts-user_id',
            'posts',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-posts-user_id',
            'posts'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-posts-user_id',
            'posts'
        );

        $this->dropTable('posts');
    }
}
