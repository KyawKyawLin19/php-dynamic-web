<?php

// require 'router.php';
class Database
{
    public $connection;

    public function __construct($config, $username = "root", $password = '')
    {
        //connect  to our MySQL database.
        //data source name
        $dsn = 'mysql:' . http_build_query($config, '',';');
        
        //pdo php data object
        $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query)
    {   
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}