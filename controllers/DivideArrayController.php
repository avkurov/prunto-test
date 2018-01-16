<?php

namespace app\controllers;

use app\components\ArrayDivider;
use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\Response;

final class DivideArrayController extends Controller
{
    /**
     * @throws BadRequestHttpException
     */
    public function actionIndex()
    {
        $array = $this->getArray();
        $number = $this->getTargetNumber();

        $divider = new ArrayDivider();
        $result = $divider->getDividerNumber($array, $number);

        return ['result' => $result];
    }

    /**
     * @throws BadRequestHttpException
     */
    private function getArray(): array
    {
        $arrayStr = Yii::$app->request->get('array');
        if (!$arrayStr) {
            throw new BadRequestHttpException('Not found target array');
        }

        $array = json_decode($arrayStr, true);
        if ($array === null) {
            throw new BadRequestHttpException('Bad format of the array');
        }

        return $array;
    }

    /**
     * @throws BadRequestHttpException
     */
    private function getTargetNumber(): int
    {
        $number = Yii::$app->request->get('number', '');
        if ($number === '') {
            throw new BadRequestHttpException('Not found target number');
        }

        if (!is_numeric($number)) {
            throw new BadRequestHttpException('Given number is not numeric');
        }

        return $number;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::class,
        ];
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }
}