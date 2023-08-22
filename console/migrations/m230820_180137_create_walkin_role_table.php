<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%walkin_role}}`.
 */
class m230820_180137_create_walkin_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%walkin_slots}}', [
            'slot_id' => $this->integer(),
            'walkin_id' => $this->integer()->notNull(),
            'start_time' => $this->time()->notNull(),
            'end_time' => $this->time()->notNull(),
        ]);
        $this->addPrimaryKey(name:'PK_walkin_slots_id',table:'{{%walkin_slots}}',columns:'slot_id');
        $this->addForeignKey(
         name:'{{%FK_walkin_walkin_id}}',
         table:'{{%walkin_slots}}',
         columns:'walkin_id',
         refTable:'{{%walkin}}',
         refColumns:'walkin_id',
         delete:'cascade'
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%walk_in_slots}}');
    }
}


