<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . getenv('MYSQL_HOST') . ';dbname=' . getenv('MYSQL_DBNAME') . ';port=' . (empty(getenv('MYSQL_PORT')) ? '3306' : getenv('MYSQL_PORT')),
    'username' => getenv('MYSQL_USER'),
    'password' => getenv('MYSQL_PASS'),
    'charset' => 'utf8mb4',
    'enableSchemaCache' => !YII_DEBUG,
    // Duration of schema cache.
    'schemaCacheDuration' => 600,
    'schemaCache' => 'cache',
];
