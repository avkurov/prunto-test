<?php

use yii\db\Migration;

/**
 * Class m180116_044814_mk_users_table
 */
class m180116_044814_mk_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => 'int unsigned PRIMARY KEY AUTO_INCREMENT',
            'access_token' => 'varchar(30) UNIQUE NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180116_044814_mk_users_table cannot be reverted.\n";

        return false;
    }
    */
}
