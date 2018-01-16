<?php

namespace app\components;

/**
 * Class ArrayDivider
 * @package app\components
 * @description Searches for a number that divides the target array on two parts: the first part with some number of
 *              target value N in array and the second part with equal number of values that not equal to target value N.
 *              For example, for an array [3, 3, 1, 2, 7, 9, 3] and target value N=3 the given number will be 5 because
 *              there is two target value 3 in first four digits and there is two numbers that not equal to target value 3
 *              in the last three digits
 */
final class ArrayDivider
{
    const RESULT_DIVIDER_NOT_FOUND = -1;

    /**
     * @param array $numbers
     * @param int   $targetNumber
     * @return int  The given number or -1 if there is no solution for target array and target number
     * @description Searches alternately for target number from left side of an target array and for numbers that not
     *              equal target number from right side of the target array
     */
    public function getDividerNumber(array $numbers, int $targetNumber): int
    {
        $leftEdge = -1;
        $rightEdge = count($numbers);

        if ($rightEdge < 2) {
            return self::RESULT_DIVIDER_NOT_FOUND;
        }

        while (true) {
            $leftEdge = $this->searchLeftEdge($numbers, $targetNumber, $leftEdge, $rightEdge);
            if ($leftEdge+1 == $rightEdge) {
                break;
            }

            $rightEdge = $this->searchRightEdge($numbers, $targetNumber, $rightEdge, $leftEdge);
            if ($leftEdge+1 >= $rightEdge) {
                break;
            }
        }

        return $leftEdge+1 == $rightEdge && $rightEdge != count($numbers) ? $rightEdge : self::RESULT_DIVIDER_NOT_FOUND;
    }

    /**
     * @param array $numbers
     * @param int   $targetNumber
     * @param int   $currentIndex
     * @param int   $maxIndex
     * @return int
     * @description Searches for the target number from left side of the array starting from current index till max index
     */
    private function searchLeftEdge(array $numbers, int $targetNumber, int $currentIndex, int $maxIndex): int
    {
        do {
            $currentIndex++;

            if ($numbers[$currentIndex] == $targetNumber) {
                return $currentIndex;
            }
        } while ($currentIndex+1 < $maxIndex);

        return $currentIndex;
    }

    /**
     * @param array $numbers
     * @param int   $targetNumber
     * @param int   $currentIndex
     * @param int   $minIndex
     * @return int
     * @description Search for number that not equals to target number from the right side of the array from the current
     *              index till min index including numbers that equals to target number right before found number
     */
    private function searchRightEdge(array $numbers, int $targetNumber, int $currentIndex, int $minIndex): int
    {
        do {
            $currentIndex--;

            if ($numbers[$currentIndex] == $targetNumber) {
                continue;
            }

            while ($numbers[$currentIndex-1] == $targetNumber && $currentIndex-1 > $minIndex) {
                $currentIndex--;
            }

            break;
        } while ($currentIndex > $minIndex);

        return $currentIndex;
    }
}