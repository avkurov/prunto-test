<?php

use app\models\ArrayDivideRequest;

class DivideArrayCest
{
    public function checkWrongAccessToken(FunctionalTester $I)
    {
        $I->amOnPage('/index.php?r=divide-array');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::UNAUTHORIZED);
    }

    public function checkWithExistingUserAndSolution(FunctionalTester $I)
    {
        $I->amOnPage('/index.php?r=divide-array&access-token=777&array=[1,2,3,4]&number=1');
        $I->seeResponseContainsJson(['result' => 3]);
        $I->seeRecord(ArrayDivideRequest::class, ['user_id' => 1, 'array' => '[1,2,3,4]', 'number' => 1, 'result' => 3]);
    }

    public function checkWithExistingUserAndAbsentSolution(FunctionalTester $I)
    {
        $I->amOnPage('/index.php?r=divide-array&access-token=777&array=[1,2,3,5]&number=4');
        $I->seeResponseContainsJson(['result' => -1]);
        $I->seeRecord(ArrayDivideRequest::class, ['user_id' => 1, 'array' => '[1,2,3,5]', 'number' => 4, 'result' => -1]);
    }
}
