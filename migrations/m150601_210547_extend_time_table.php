<?php

use yii\db\Schema;
use yii\db\Migration;

class m150601_210547_extend_time_table extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        //$this->addColumn('{{%time}}','updated_by',Schema::TYPE_INTEGER.' NOT NULL');
        $this->addForeignKey('fk_time_user_id', '{{%time}}', 'user_id', '{{%user}}', 'id', 'NO ACTION', 'NO ACTION');     
    
    }

    public function down()
    {
        $this->dropForeignKey('fk_time_user_id','{{%time}}');
        //$this->dropColumn('{{%time}}','user_id');
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
