<?php

use yii\db\Migration;
use yii\db\Schema\Type;

/**
 * Handles the creation of table `{{%applicant}}`.
 */
class m230817_162649_create_applicant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%applicant}}', [
            'applicant_id' => $this->integer(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'resume_url' => $this->string()->notNull(),
            'portfolio_url' => $this->string(),
            'preferred_job_roles' => $this->string()->notNull(),
            'referral' => $this->string(),
            'email_updates' => $this->boolean(),
            'aggregate_percentage' => $this->integer()->notNull(),
            'passing-year' => $this->date(),
            'qualification' => $this->string(),
            'stream' => $this->string(),
            'college' => $this->string(),
            'applicant_type' => "ENUM('fresher', 'experienced')",
            'experience' => $this->integer(),
            'current_ctc' => $this->integer(),
            'expected_ctc' => $this->integer(),
            'expert_technologies' => $this->string(),
            'familiar_technologies' => $this->string(),
            'notice_period' => $this->boolean(),
            'notice_period_end' => $this->date(),
            'notice_period_length' => $this->integer(),
            'test_appeared' => $this->boolean(),
            'test_role' => $this->string(),
            'user_password' => $this->string(),
            'date_created' => $this->date(),
            'date_modified' => $this->date(),
        ]);
        $this->addPrimaryKey(name:'PK_applicant_applicant_id',table:'{{%applicant}}',columns:'applicant_id');
        $this->alterColumn('{{%applicant}}', 'applicant_id', $this->Integer().' NOT NULL AUTO_INCREMENT');
    }

    

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%applicant}}');
    }
}
