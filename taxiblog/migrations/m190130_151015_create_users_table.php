<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m190130_151015_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'role_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `role_id`
        $this->createIndex(
            'idx-users-role_id',
            'users',
            'role_id'
        );

        // add foreign key for table `roles`
        $this->addForeignKey(
            'fk-users-role_id',
            'users',
            'role_id',
            'roles',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-users-role_id',
            'users'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            'idx-users-role_id',
            'users'
        );

        $this->dropTable('users');
    }
}
