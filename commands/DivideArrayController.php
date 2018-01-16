<?php

namespace app\commands;

use app\components\ArrayDivider;
use Exception;
use yii\console\Controller;

final class DivideArrayController extends Controller
{
    /**
     * @param string    $array
     * @param string    $number
     * @throws Exception
     */
    public function actionIndex($array, $number)
    {
        $array = $this->processArray($array);
        $this->checkNumber($number);

        $arrayDivider = new ArrayDivider();
        $result = $arrayDivider->getDividerNumber($array, $number);

        echo 'result: ' . $result . PHP_EOL;
    }

    /**
     * @param string $array
     * @return array
     * @throws Exception
     */
    private function processArray(string $array): array
    {
        $result = json_decode($array, true);
        if ($result === null || !is_array($result)) {
            throw new Exception('Bad format for the array');
        }

        return $result;
    }

    /**
     * @param string $number
     * @throws Exception
     */
    private function checkNumber(string $number): void
    {
        if (!is_numeric($number)) {
            throw new Exception('Bad format of the number: it must be a numeric value');
        }
    }
}