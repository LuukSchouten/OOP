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

    public function getName()
    {
        return $this->getName;
    }

    public function getWeakness()
    {
        return $this->weakness;
    }

    public function getResistance()
    {
        return $this->resistance;
    }

    public function getEnergyType()
    {
        return $this->energyType;
    }

    public function takeDamage($damage)
    {
        $this->health -= $damage;
        return $damage;
    }

    public function getAttacks()
    {
        return $this->attacks;
    }

}


?>