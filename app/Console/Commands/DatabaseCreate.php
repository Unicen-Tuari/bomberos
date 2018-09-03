<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;
use PDOException;

class DatabaseCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates a new database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $database = env('DB_DATABASE', false);

      if (! $database) {
          $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
          return;
      }

      try {
          $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));
          $statement = $pdo->prepare("SELECT 1 FROM pg_database WHERE datname = '$database'");
          $statement->execute();
          if ($statement->rowCount() == 0) {
            $statement = $pdo->prepare("CREATE DATABASE $database");
            $statement->execute();
            $this->info(sprintf('Successfully created %s database', $database));
          }
          else{
            $this->info(sprintf('Database %s already exists', $database));
          }

      } catch (PDOException $exception) {
          $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
      }
    }
    /**
     * @param  string $host
     * @param  integer $port
     * @param  string $username
     * @param  string $password
     * @return PDO
     */
    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('pgsql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
