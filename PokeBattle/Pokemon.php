<?php

class Pokemon
{
    private $name;
    protected $energyType;
    protected $maxHP;
    public $health;
    protected $attacks;
    protected $weakness;
    protected $resistance;

    protected static $population = 0;

    public function __construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance) {
        $this->name = $name;
        $this->energyType = $energyType;
        $this->maxHP = $hitpoints;
        $this->health = $hitpoints;
        $this->attacks = $attacks;
        $this->weakness = $weakness;
        $this->resistance = $resistance;

        self::$population++;
    }

    public function getHealth()
    {
        return $this->health;
    }


}


?>