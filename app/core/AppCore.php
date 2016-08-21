<?php

namespace App\core;

use App\core\Database;
use App\config\Parameters;

/**
 * Description of AppCore
 *
 * @author rodrigue
 */
class AppCore {

    private static $db;

    public static function getDb() {
        if(self::$db === null)
            self::$db = new Database (Parameters::DB_NAME, Parameters::DB_HOST, Parameters::DB_USER, Parameters::DB_PWD);
        return self::$db;
    }

}
