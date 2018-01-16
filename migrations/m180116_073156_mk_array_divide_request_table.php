<?php

use yii\db\Migration;

/**
 * Class m180116_073156_mk_array_divide_request_table
 */
class m180116_073156_mk_array_divide_request_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%array_divide_request}}', [
            'id' => 'int unsigned PRIMARY KEY AUTO_INCREMENT',
            'user_id' => 'int unsigned NOT NULL',
            'array' => 'text NOT NULL',
            'number' => 'int NOT NULL',
            'result' => 'int NOT NULL',
            'INDEX user_id (user_id)',
            'FOREIGN KEY (user_id) REFERENCES {{%user}}(id) ON DELETE CASCADE',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%array_divide_request}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180116_073156_mk_array_divide_request_table cannot be reverted.\n";

        return false;
    }
    */
}
