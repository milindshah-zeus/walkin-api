<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job_role}}`.
 */
class m230818_070740_create_job_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%job_role}}', [
            'role_id' => $this->integer(),
            'role_name' => $this->string()->notNull(),
            'compensation' => $this->integer()->notNull(),
            'role_description' => $this->text()->notNull(),
            'requirements' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE NOW()'),
        ]);
        $this->addPrimaryKey(name:'PK_job_role_role_id',table:'{{%job_role}}',columns:'role_id');
        $this->alterColumn('{{%job_role}}', 'role_id', $this->Integer().' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%job_role}}');
    }
}
