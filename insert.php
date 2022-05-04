<?php

use Doctrine\DBAL\DriverManager;
use Oscorp\Usrps\Player;
use Oscorp\Usrps\Round;

require_once 'vendor/autoload.php';

echo '
<header style="background-color: gray">
    <a href="index.php">Home </a>
    <a href="delete.php">Delete Record</a>
    <a href="insert.php">Insert Record</a>
</header><br>';



$connectionParams = [
    'dbname' => 'USRPS',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost:3306',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);


echo '<h1>Player:</h1>
<form method="post">
        <input type="text" name="deleteItem" value="'.$round->getId().'">
        <input type="submit" name="button"
                value="Delete Game"/>
    </form>';

echo '<h1>Round:</h1>
<form method="post">
        <input type="text" name="deleteItem" value="'.$round->getId().'">
        <input type="submit" name="button"
                value="Delete Game"/>
    </form>';