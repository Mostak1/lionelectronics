<?php
namespace App;
class db{
    public static $conn ;
    public static function connect() {
        self::$conn = new \mysqli(settings()['hostname'],settings()['user'],settings()['password'],settings()['database']);
        return self::$conn;
    }
}
