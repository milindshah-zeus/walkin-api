<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%walkin}}`.
 */
class m230817_071124_create_walkin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%walkin}}', [
            'walkin_id' => $this->integer(),
            'role_type' => $this->string()->notNull(),
            'start_Date' => $this->date()->notNull(),
            'end_Date' => $this->date()->notNull(),
            'expiry_Date' => $this->date()->notNull(),
            'location' => $this->string()->notNull(),
            'job_roles' => $this->string()->notNull(),
            'remarks'=> $this->string(),
            'slots'=> $this->string()->notNull(),
            'instructions'=>$this->text(),
            'system_requirements'=>$this->text(),
            'walk_in_process'=>$this->text(),
            'created'=>$this->dateTime(),
            'modified'=>$this->dateTime(),            
        ]);
        $this->addPrimaryKey(name:'PK_walkin_walkin_id',table:'{{%walkin}}',columns:'walkin_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%walkin}}');
    }
}
