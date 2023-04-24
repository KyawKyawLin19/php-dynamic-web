<?php

require 'functions.php';

// require 'router.php';
class Database
{
    public function query($query)
    {   
        //connect  to our MySQL database.
        //data source name
        $dsn = "mysql:host=localhost;port=3306;dbname=myapp_db;charset=utf8mb4";

        //pdo php data object
        $pdo = new PDO($dsn,'root','',[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        $statement = $pdo->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }
}


$db = new Database();

$posts = $db->query("select * from posts");

foreach($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}