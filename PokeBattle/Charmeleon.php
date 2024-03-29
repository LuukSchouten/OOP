<?php 

class Charmeleon extends Pokemon
{
    public function __construct($name)
    {
        $energyType = new EnergyType("Fire");
        $hitpoints = 60;
        $attacks = [
            new Attack("Head Butt", 10, new EnergyType("Normal")),
            new Attack("Flare", 30, new EnergyType("Fire"))
        ];
        $weakness = new Weakness(new EnergyType("Water"), 2);
        $resistance = new Resistance(new EnergyType("Lightning"), 10);

        parent::__construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance);
    }
    
}

?>