<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231027120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create users table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('users');
        $table->addColumn('id', 'string', ['length' => 50]);
        $table->addColumn('name', 'string', ['length' => 80]);
        $table->addColumn('email', 'string', ['length' => 50]); // Remove unique here.
        $table->addColumn('password', 'string', ['length' => 100]);
        $table->addColumn('createdAt', 'datetime_immutable');
        $table->setPrimaryKey(['id']);
       // $table->addUniqueIndex(['email'], 'unique_email_index', ['length' => ['50']]); // Add unique index with prefix.
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('users');
    }
}
