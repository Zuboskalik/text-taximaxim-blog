<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m190130_150912_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),//admin,author,authorised
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('roles');
    }
}
