<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%walkin_role}}`.
 */
class m230820_180456_create_walkin_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%walkin_role}}', [
            'walkin_role_id' => $this->integer(),
            'walkin_id' => $this->integer(),
            'role_id' => $this->integer(),
        ]);
        $this->addPrimaryKey(name: 'PK_walkin_role', table: '{{%walkin_role}}', columns: 'walkin_role_id');
        $this->addForeignKey(
            name: '{{%FK_walkin_role_id}}',
            table: '{{%walkin_role}}',
            columns: 'walkin_id',
            refTable: '{{%walkin}}',
            refColumns: 'walkin_id',
            delete: 'cascade'
        );
        $this->addForeignKey(
            name: '{{%FK_walkin_role_role_id}}',
            table: '{{%walkin_role}}',
            columns: 'role_id',
            refTable: '{{%job_role}}',
            refColumns: 'role_id',
            delete: 'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%walkin_role}}');
    }
}
