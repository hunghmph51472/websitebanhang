<?php
class Database {
    private static $host = 'localhost';
    private static $dbName = 'webduanbanhang';
    private static $username = 'root';
    private static $password = '';
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            try {
                $dsn = "mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8";
                self::$conn = new PDO($dsn, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                die("DB Connection failed: ".$ex->getMessage());
            }
        }
        return self::$conn;
    }
}