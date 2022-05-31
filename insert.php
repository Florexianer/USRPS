<?php

use Doctrine\DBAL\DriverManager;
use Oscorp\Usrps\Player;
use Oscorp\Usrps\Round;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';

/**
echo '
<header style="background-color: gray">
    <a href="index.php">Home </a>
    <a href="delete.php">Delete Record</a>
    <a href="insert.php">Insert Record</a>
</header><br>';
*/


$connectionParams = [
    'driver' => 'pdo_sqlite',
    //'path' => 'C:\xampp\htdocs\Projects\USRPS\db.sqlite',
    'path' => '/Applications/XAMPP/xamppfiles/htdocs/WEBT/USRPS/db.sqlite',

];

$conn = DriverManager::getConnection($connectionParams);


if(isset($_POST['insertUserButton'])) {

    $firstName = htmlspecialchars($_POST['firstName']);

    $lastName = htmlspecialchars($_POST['lastName']);

    $conn->createQueryBuilder()->insert('player')->values(
        [
            'firstName' => '?',
            'lastName' => '?'
        ])
        ->setParameter(0, $firstName)
        ->setParameter(1, $lastName)
        ->executeQuery();
}

if(isset($_POST['insertGameButton'])) {

    $fk_pk0 = htmlspecialchars($_POST['player0']);

    $fk_pk1 = htmlspecialchars($_POST['player1']);

    $pick0 = htmlspecialchars($_POST['pick0']);

    $pick1 = htmlspecialchars($_POST['pick1']);

    $date = htmlspecialchars($_POST['date']);

    if(is_numeric($_POST['winner'])) {
        $winner = ($_POST['winner']-1);
    } else {
        $winner = $_POST['winner'];
    }




    $conn->createQueryBuilder()->insert('round')->values(
        [
            'player0' => '?',
            'player1' => '?',
            'pick0' => '?',
            'pick1' => '?',
            'datetime' => '?',
            'winner' => '?',
        ])
        ->setParameter(0, $fk_pk0)
        ->setParameter(1, $fk_pk1)
        ->setParameter(2, $pick0)
        ->setParameter(3, $pick1)
        ->setParameter(4, $date)
        ->setParameter(5, $winner)
        ->executeQuery();
}


$query1 = $conn->createQueryBuilder()->SELECT('*')->FROM('Player');

$players = $query1->executeQuery()->fetchAllAssociative();


$loader = new FilesystemLoader('.');

$twig = new Environment($loader);

echo $twig->render('insert.html', ['players' => $players]);


/*echo '<h1>Player:</h1>
<form method="post">
        <label for="firstName">First Name: </label>
        <input type="text" name="firstName">
        <br>
        <label for="lastName">Last Name: </label>
        <input type="text" name="lastName">
        <br><br>
        <input type="submit" name="insertUserButton" value="Insert User"/>
    </form>';


echo '<h1>Round:</h1>
<form method="post">
        <label for="player0">Player 1*:</label>
        <select name="player0" id="player1">';

foreach ($players as $player) {
    echo '<option value="'.$player['pk_ID'].'">'.$player['firstName'].' '.$player['lastName'].'</option>';
}

echo '</select><br>
<label for="player1">Player 2*:</label>
        <select name="player1" id="player1">';

foreach ($players as $player) {
    echo '<option value="'.$player['pk_ID'].'">'.$player['firstName'].' '.$player['lastName'].'</option>';
}

echo '  </select><br>
        <label for="pick0">Pick of Player 1*: </label>
        <select name="pick0" id="pick0">
            <option value="r">Rock</option>
            <option value="p">Paper</option>
            <option value="s">Scissors</option>
        </select><br>
        <label for="pick1">Pick of Player 2*: </label>
        <select name="pick1" id="pick1">
            <option value="r">Rock</option>
            <option value="p">Paper</option>
            <option value="s">Scissors</option>
        </select><br>
        <label for="date">Date*: </label>
        <input type="datetime-local" name="date"><br>
        <label for="winner">Winner: </label>
        <input type="number" name="winner" min="1" max="2"><br>';

echo '
        
        <input type="submit" name="insertGameButton" value="Insert Game"/>
    </form>';*/