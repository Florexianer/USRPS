<?php

namespace Oscorp\Usrps;

use Doctrine\ORM\Mapping as ORM;

require_once 'vendor/autoload.php';

/**
 * @ORM\Entity
 */
class Round
{

    /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $pk_ID;

    /**
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="player0", referencedColumnName="pk_ID")
     */
    private Player $player0;

    /**
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="player1", referencedColumnName="pk_ID")
     */
    private Player $player1;

    /**
     * @ORM\Column
     */
    private string $pick0;

    /**
     * @ORM\Column
     */
    private string $pick1;

    /**
     * @ORM\Column
     */
    private string $datetime;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $winner;

    /**
     * @param int $pk_ID
     * @param Player $player0
     * @param Player $player1
     * @param string $pick0
     * @param string $pick1
     * @param string $datetime
     * @param bool $winner
     */
    public function __construct(int $pk_ID, Player $player0, Player $player1, string $pick0, string $pick1, string $datetime, ?bool $winner)
    {
        $this->player0 = $player0;
        $this->player1 =$player1;
        $this->pick0 =  $pick0;
        $this->pick1 =  $pick1;
        $this->datetime = $datetime;
        $this->pk_ID = $pk_ID;
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
    public function getpk_ID(): int
    {
        return $this->pk_ID;
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
    public function getDatetime(): string
    {
        return $this->datetime;
    }


}