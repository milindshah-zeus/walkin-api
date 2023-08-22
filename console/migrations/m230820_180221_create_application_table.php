<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m230820_180221_create_application_table extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%application}}', [
            'hallticket_id' => $this->integer(),
            'applicant_id' => $this->integer(),
            'slot_id' => $this->integer(),
            'walkin_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE NOW()'),
        ]);
        $this->addPrimaryKey(name: 'PK_application_hallticket_id', table: '{{%application}}', columns: 'hallticket_id');
        $this->addForeignKey(
            name: '{{%FK_applicant_id}}',
            table: '{{%application}}',
            columns: 'applicant_id',
            refTable: '{{%applicant}}',
            refColumns: 'applicant_id',
            delete: 'cascade'
        );
        $this->addForeignKey(
            name: '{{%FK_walkin_slot_id}}',
            table: '{{%application}}',
            columns: 'slot_id',
            refTable: '{{%walkin_slots}}',
            refColumns: 'slot_id',
            delete: 'cascade'
        );
        $this->addForeignKey(
            name: '{{%FK_walkin_id}}',
            table: '{{%application}}',
            columns: 'walkin_id',
            refTable: '{{%walkin}}',
            refColumns: 'walkin_id',
            delete: 'cascade'
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%application}}');
    }
}