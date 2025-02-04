<?php



namespace Core\Database;


use  Dotenv\Dotenv;
use PDO;
use PDOException;


class Database
{

    private static $pdoSinglton;


    public static function getConnection()
    {



        // $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        // $dotenv->load();



        if (self::$pdoSinglton != null) {
            return self::$pdoSinglton;
        }

        $servername = $_ENV['DB_HOST'];
        $port = $_ENV['PORT'];
        $databasename = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        $conStr = sprintf(
            "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            $servername,
            $port,
            $databasename,
            $username,
            $password
        );


        try {
            $conn = new PDO($conStr);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected successfully";

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
