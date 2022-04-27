<?php

use Oscorp\Usrps\Player;
use Oscorp\Usrps\Round;

require_once 'vendor/autoload.php';


$player0 = new Player(1,'Florian', 'Kozel');

$player1 = new Player(2,'Richi', 'Richman');

$round = new Round(1, $player0, $player1, 'r', 'p', date('Y/m/d H:i:s'), null);


echo $round->getPlayer0()->getFirstName();
echo ', picked: '.$round->getPick0();
echo '<br>'.$round->getPlayer1()->getFirstName();
echo ', picked: '.$round->getPick1();
echo '<br>'.$round->getDate();
echo '<br>The Winner is: '.($round->getWinner() === null ? 'nobody' : ($round->getWinner() ? 'player 2' : 'player 1'));
