<?php

namespace CaliforniaMountainSnake\LaravelMigrations;

use Illuminate\Database\Migrations\Migration;
use PDO;

abstract class BaseMigration extends Migration implements MigrationInterface
{
    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->getDatabaseConnection()->getConnection()->getPdo();
    }
}
