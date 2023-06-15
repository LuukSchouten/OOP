<?php

class Attack
{
    public $name;
    public $damage;
    public $energyType;

    public function __construct($name, $damage, $energyType)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->energyType = $energyType;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDamage()
    {
        return $this->damage;
    }
    
    public function getEnergyType()
    {
        return $this->energyType;
    }
}


?>