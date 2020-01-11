<?php

namespace CaliforniaMountainSnake\LaravelMigrations;

use Illuminate\Database\Schema\Builder;
use PDO;

/**
 * Interface represents a Migration class.
 */
interface MigrationInterface
{
    /**
     * @return Builder
     */
    public function getDatabaseConnection(): Builder;

    /**
     * @return PDO
     */
    public function getPdo(): PDO;
}
