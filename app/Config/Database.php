<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

       /**
        * Sample database connection for SQLite3.
        *
        * @var array<string, mixed>
        */
       public array $default = [
           'database'    => WRITEPATH.'mobile-money.db',
           'DBDriver'    => 'SQLite3',
           'DBPrefix'    => '',
           'DBDebug'     => true,
           'swapPre'     => '',
           'failover'    => [],
           'foreignKeys' => true,
           'busyTimeout' => 1000,
           'synchronous' => null,
           'dateFormat'  => [
               'date'     => 'Y-m-d',
               'datetime' => 'Y-m-d H:i:s',
               'time'     => 'H:i:s',
           ],
       ];

    public function __construct()
    {
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
