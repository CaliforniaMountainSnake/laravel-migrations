# laravel-migrations
Use different Migration classes for different database connections in Laravel.
With this library you can easy specify on which database connection each migration will be executed.

## Install:
### Require this package with Composer
Install this package through [Composer](https://getcomposer.org/).
Edit your project's `composer.json` file to require `californiamountainsnake/laravel-migrations`:
```json
{
    "name": "yourproject/yourproject",
    "type": "project",
    "require": {
        "php": "^7.2",
        "californiamountainsnake/laravel-migrations": "*"
    }
}
```
and run `composer update`

### or
run this command in your command line:
```bash
composer require californiamountainsnake/laravel-migrations
```

## Usage:
1. Create some connections in `config/database.php` file.
2. Create a Migration class for each needed connection:
```php
<?php
use CaliforniaMountainSnake\LaravelMigrations\BaseMigration;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;

class DatabaseOneMigration extends BaseMigration {
    /**
     * @return Builder
     */
    public function getDatabaseConnection() : Builder {
         return Schema::connection('your_db_connection_name');
    }
}
```
3. Create a migration via artisan as usual.
4. Extend this migration class from one of your migration classes instead of `Illuminate\Database\Migrations\Migration`. You can also use a built-in class `CaliforniaMountainSnake\LaravelMigrations\DefaultMigration` for the default db connection.
5. Write you migration!
```php
<?php
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends DatabaseOneMigration  {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $this->getDatabaseConnection()->create('users', static function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('email', 256)->unique();
            $table->string('name', 256);
            
            $table->engine    = 'InnoDB';
            $table->charset   = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_520_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        $this->getDatabaseConnection()->dropIfExists('users');
    }
}
```
