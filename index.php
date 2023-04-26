<?php

require 'functions.php';
require 'Database.php';

$config = require('config.php');

$db = new Database($config['database']);

$id = $_GET['id'];

//keyed wild card parameters
$query = "select * from posts where id = :id";

$posts = $db->query($query, [':id' => $id])->fetch();

foreach($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}