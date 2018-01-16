<?php

namespace app\tests\unit;

use app\components\ArrayDivider;
use Codeception\Test\Unit;

class ArrayDividerTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testArrayThatDoesNotHaveTargetNumber()
    {
        $arrayDivider = new ArrayDivider();
        $dividerNum = $arrayDivider->getDividerNumber([1, 2, 3], 4);
        $this->assertEquals(-1, $dividerNum);
    }

    public function testEmptyArray()
    {
        $arrayDivider = new ArrayDivider();
        $dividerNum = $arrayDivider->getDividerNumber([], 0);
        $this->assertEquals(-1, $dividerNum);
    }

    public function testArraysWithExistingSolution()
    {
        $arrayDivider = new ArrayDivider();

        $dividerNum = $arrayDivider->getDividerNumber([4, 3], 4);
        $this->assertEquals(1, $dividerNum);

        $dividerNum = $arrayDivider->getDividerNumber([5, 1, 2, 9], 5);
        $this->assertEquals(3, $dividerNum);

        $dividerNum = $arrayDivider->getDividerNumber([3, 3, 3, 3, 8, 9], 3);
        $this->assertEquals(2, $dividerNum);

        $dividerNum = $arrayDivider->getDividerNumber([8, 9, 8], 8);
        $this->assertEquals(1, $dividerNum);
    }

    public function testArraysWithNonExistingSolution()
    {
        $arrayDivider = new ArrayDivider();

        $dividerNum = $arrayDivider->getDividerNumber([4], 4);
        $this->assertEquals(-1, $dividerNum);

        $dividerNum = $arrayDivider->getDividerNumber([1, 1, 1], 1);
        $this->assertEquals(-1, $dividerNum);

        $dividerNum = $arrayDivider->getDividerNumber([1, 2, 7], 7);
        $this->assertEquals(-1, $dividerNum);
    }
}