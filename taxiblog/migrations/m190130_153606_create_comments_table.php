<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m190130_153606_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer()->notNull(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-comments-post_id',
            'comments',
            'post_id'
        );

        // add foreign key for table `posts`
        $this->addForeignKey(
            'fk-comments-post_id',
            'comments',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `posts`
        $this->dropForeignKey(
            'fk-comments-post_id',
            'comments'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-comments-post_id',
            'comments'
        );

        $this->dropTable('comments');
    }
}
