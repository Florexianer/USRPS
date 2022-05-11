<?php

namespace Oscorp\Usrps;

use Doctrine\ORM\Mapping as ORM;

require_once 'vendor/autoload.php';

/**
 * @ORM\Entity
 */
class Player
{
    /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $pk_ID;

    /**
     * @ORM\Column
     */
    private string $firstName;

    /**
     * @ORM\Column
     */
    private string $lastName;

    /**
     * @param int $pk_ID
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(int $pk_ID, string $firstName, string $lastName)
    {
        $this->pk_ID = $pk_ID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getpk_ID(): int
    {
        return $this->pk_ID;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }



}