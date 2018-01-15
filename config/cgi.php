<?php

$config = yii\helpers\ArrayHelper::merge(
    require('common.php'),
    require('common-local.php')
);

return $config;