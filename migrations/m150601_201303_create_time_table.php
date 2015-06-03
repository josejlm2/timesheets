<?php

use yii\db\Schema;
use yii\db\Migration;

class m150601_201303_create_time_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
          if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }
 
          $this->createTable('{{%time}}', [
              'id' => Schema::TYPE_PK,
              'user_id' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT \'\' ',
              'date' => Schema::TYPE_DATE . ' DEFAULT NULL',
              'arrival' => Schema::TYPE_TIME . '  ',
              'lunch_start' => Schema::TYPE_TIME . '',
              'lunch_end' => Schema::TYPE_TIME . ' ',
              'departure' => Schema::TYPE_TIME . ' ' ,
              'total' => Schema::TYPE_INTEGER . ' DEFAULT 0',
          ], $tableOptions);   
    }

    public function down()
    {
        $this->dropTable('{{%time}}');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
