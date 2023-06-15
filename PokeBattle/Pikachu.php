<?php 

class Pikachu extends Pokemon
{
    public function __construct($name)
    {
        $energyType = new EnergyType("Electric");
        $hitpoints = 60;
        $attacks = [
            new Attack("Electric Ring", 50, new EnergyType("Lightning")),
            new Attack("Pika Punch", 20, new EnergyType("Normal"))
        ];
        $weakness = new Weakness(new EnergyType("Fire"), 1.5);
        $resistance = new Resistance(new EnergyType("Fighting"), 20);

        parent::__construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance);
    }

}

?>