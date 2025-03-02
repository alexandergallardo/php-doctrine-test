<?php

require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use App\Infrastructure\Persistence\Doctrine\Type\UserEmailType;
use App\Infrastructure\Persistence\Doctrine\Type\UserIdType;
use App\Infrastructure\Persistence\Doctrine\Type\UserNameType;
use App\Infrastructure\Persistence\Doctrine\Type\UserPasswordType;

// Configuración de Doctrine
$paths = [__DIR__ . '/src'];
$isDevMode = true;

// Configuración de la base de datos
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => 'mysql',
    'port'     => '3306',
    'user'     => 'usertest',
    'password' => 'passwordtest',
    'dbname'   => 'php_doctrine_test',
];

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: $paths,
    isDevMode: $isDevMode
);

// Registrar el tipo personalizado
try {
    Type::addType('user_id', UserIdType::class);
    $config->addCustomDatetimeFunction('user_id', 'App\Infrastructure\Persistence\Doctrine\Type\UserIdType');

    Type::addType('name', UserNameType::class);
    $config->addCustomDatetimeFunction('name', 'App\Infrastructure\Persistence\Doctrine\Type\UserNameType');

    Type::addType('email', UserEmailType::class);
    $config->addCustomDatetimeFunction('email', 'App\Infrastructure\Persistence\Doctrine\Type\UserEmailType');

    Type::addType('password', UserPasswordType::class);
    $config->addCustomDatetimeFunction('password', 'App\Infrastructure\Persistence\Doctrine\Type\UserPasswordType');
} catch (\Doctrine\DBAL\Exception $e) {
}

$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);
