<?php

namespace CaliforniaMountainSnake\LaravelMigrations;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

/**
 * Migration class for the default database connection.
 */
class DefaultMigration extends BaseMigration
{
    /**
     * @return Builder
     */
    public function getDatabaseConnection(): Builder
    {
        return Schema::connection(Config::get('database.default'));
    }
}
