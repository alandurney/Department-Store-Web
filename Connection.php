<?php
class Connection {
    //CONNECTS APP TO DATABASE
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connect to the database
            $host = "daneel";
            $database = "N00133840";
            $username = "N00133840";
            $password = "N00133840";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            //IF STATEMENT TELLS USER IF THEY CANNOT CONNECT TO DATABASE
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }
        
        return Connection::$connection;
    }
}
