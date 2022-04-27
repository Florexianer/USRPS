<?php

namespace Oscorp\Usrps;

require_once 'vendor/autoload.php';

class Round
{

    private int $id;

    private Player $player0;

    private Player $player1;
    
    private string $pick0;
    
    private string $pick1;

    private string $date;

    private ?bool $winner;

    /**
     * @param int $id
     * @param Player $player0
     * @param Player $player1
     * @param string $pick0
     * @param string $pick1
     * @param string $date
     * @param bool $winner
     */
    public function __construct(int $id, Player $player0, Player $player1, string $pick0, string $pick1, string $date, ?bool $winner)
    {
        $this->player0 = $player0;
        $this->player1 =$player1;
        $this->pick0 =  $pick0;
        $this->pick1 =  $pick1;
        $this->date = $date;
        $this->id = $id;
        $this->winner = $winner;
    }
    

    /**
     * @return string
     */
    public function getPick0(): string
    {
        return $this->pick0;
    }

    /**
     * @return string
     */
    public function getPick1(): string
    {
        return $this->pick1;
    }

    /**
     * @return bool
     */
    public function getWinner(): ?bool
    {
        return $this->winner;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return Player
     */
    public function getPlayer0(): Player
    {
        return $this->player0;
    }

    /**
     * @return Player
     */
    public function getPlayer1(): Player
    {
        return $this->player1;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }


}