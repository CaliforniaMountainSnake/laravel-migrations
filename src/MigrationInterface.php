<?php

namespace CaliforniaMountainSnake\LaravelMigrations;

use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder;
use PDO;

/**
 * Interface represents a Migration class.
 */
interface MigrationInterface
{
    /**
     * @return Connection
     */
    public function getDbConnection(): Connection;

    /**
     * @return Builder
     */
    public function getSchemaConnection(): Builder;

    /**
     * @return PDO
     */
    public function getPdo(): PDO;
}
