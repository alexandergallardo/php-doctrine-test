<?php

require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

// Configuración de Doctrine
$paths = [__DIR__ . '/src'];
$isDevMode = true;

// Configuración de la base de datos
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'port'     => '3306',
    'user'     => 'itpeople',
    'password' => 'ITPEOPLESAS',
    'dbname'   => 'php_doctrine_test',
];

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: $paths,
    isDevMode: $isDevMode
);

$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);
