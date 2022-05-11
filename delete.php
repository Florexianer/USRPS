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
    'dbname' => 'main',
    'host' => 'jdbc:sqlite:C:\xampp\htdocs\Projects\USRPS\db.sqlite',
    'driver' => 'pdo_sqlite',
];
$conn = DriverManager::getConnection($connectionParams);

if(isset($_POST['deleteButton'])) {
    $conn->createQueryBuilder()->DELETE('Round')->WHERE('pk_ID='.$_POST['deleteItem'])->executeQuery();
}

$query0 = $conn->createQueryBuilder()->SELECT('*')->FROM('Player','p0')
    ->JOIN('p0','Round', 'r','p0.pk_ID = r.fk_pk_player0');

$cursor = $query0->executeQuery()->fetchAllAssociative();

foreach ($cursor as $roundAndPlayer0) {
    $query1 = $conn->createQueryBuilder()->SELECT('*')->FROM('Player','p1')
        ->WHERE('p1.pk_ID='.$roundAndPlayer0['fk_pk_player1']);

    $player1 = $query1->executeQuery()->fetchAllAssociative();

    $player0 = new Player($roundAndPlayer0['fk_pk_player0'],$roundAndPlayer0['Vorname'], $roundAndPlayer0['Nachname']);

    $player1 = new Player($player1[0]['pk_ID'],$player1[0]['Vorname'], $player1[0]['Nachname']);

    $round = new Round($roundAndPlayer0['pk_ID'], $player0, $player1, $roundAndPlayer0['pick0'], $roundAndPlayer0['pick1'], $roundAndPlayer0['datetime'], $roundAndPlayer0['winner']);

    $rounds[] = $round;
}

foreach ($rounds as $round) {

    echo '<div style="background-color: gray">Game '.$round->getpk_ID().':<br>';
    echo $round->getPlayer0()->getFirstName();
    echo ', picked: '.$round->getPick0();
    echo '<br>'.$round->getPk_player1()->getFirstName();
    echo ', picked: '.$round->getPick1();
    echo '<br>'.$round->getDatetime();
    echo '<br>The Winner is: '.($round->getWinner() === null ? 'nobody' : ($round->getWinner() ? 'player 2' : 'player 1'));

    echo '<form method="post">
        <input type="hidden" name="deleteItem" value="'.$round->getpk_ID().'">
        <input type="submit" name="deleteButton"
                value="Delete Game"/>
    </form>';

    echo '</div><br>';
}