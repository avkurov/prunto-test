<?php

$config =  yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/common.php'),
    require(__DIR__ . '/common-local.php'),
    [
        'id' => 'prunto-test',
        'basePath' => dirname(__DIR__),
    ]
);
return $config;