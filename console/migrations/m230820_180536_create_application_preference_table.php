<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application_preference}}`.
 */
class m230820_180536_create_application_preference_table extends Migration
{
    /**
    * {@inheritdoc}
    */
   public function safeUp()
   {
       $this->createTable('{{%application_preference}}', [
           'hallticket_id' =>  $this->integer()->notNull(),
           'walkin_role_id' => $this->integer()->notNull(),
       ]);
       $this->addPrimaryKey(name: 'PK_application_preference', table: '{{%application_preference}}', columns: ['hallticket_id', 'walkin_role_id']);
       $this->addForeignKey(
           name: '{{%FK_application_hallticket_id}}',
           table: '{{%application_preference}}',
           columns: 'hallticket_id',
           refTable: '{{%application}}',
           refColumns: 'hallticket_id',
           delete: 'cascade'
       );
       $this->addForeignKey(
           name: '{{%FK_preference_role_id}}',
           table: '{{%application_preference}}',
           columns: 'walkin_role_id',
           refTable: '{{%walkin_role}}',
           refColumns: 'walkin_role_id',
           delete: 'cascade'
       );
   }


   /**
    * {@inheritdoc}
    */
   public function safeDown()
   {
       $this->dropTable('{{%application_preference}}');
   }
}