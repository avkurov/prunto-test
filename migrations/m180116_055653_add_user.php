<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m180116_055653_add_user
 */
class m180116_055653_add_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $user = new User();
        $user->access_token = '777';
        $user->save();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $model = User::find()->andWhere(['access_token' => '777'])->one();
        if ($model) {
            $model->delete();
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180116_055653_add_user cannot be reverted.\n";

        return false;
    }
    */
}
