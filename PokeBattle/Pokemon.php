<?php

class Pokemon
{
    public static $population = 0;
    public $name;
    public $type;
    public $hp;
    public $health;
    public $attacks;
    public $weakness;
    public $resistance;

    public function __construct($name, $type, $hp, $attacks, $weakness, $resistance)
    {
        $this->name = $name;
        $this->type = $type;
        $this->hp = $hp;
        $this->health = $hp;
        $this->attacks = $attacks;
        $this->weakness = $weakness;
        $this->resistance = $resistance;
        self::$population++;
    }

    public function attack($attack, $target)
    {
        $damage = $attack['damage'];
        $type = $attack['type'];
    
        if ($type == $target->weakness['type']) {
            $damage *= $target->weakness['multiplier'];
            $this->attackMessage = "{$this->name} used {$attack['name']} against {$target->name} and dealt {$damage} damage (Super effective!)";
        } elseif ($type == $target->resistance['type']) {
            $damage -= $target->resistance['value'];
            $this->attackMessage = "{$this->name} used {$attack['name']} against {$target->name} and dealt {$damage} damage (not very effective...)";
        } else {
            $this->attackMessage = "{$this->name} used {$attack['name']} against {$target->name} and dealt {$damage} damage";
        }
    
        echo $this->attackMessage . "\n";
        echo "</br>";
        echo "</br>";
    
        $target->health -= $damage;
        if ($target->health <= 0) {
            $target->health = 0;
            self::$population--;
            echo "{$target->name} ({$target->type}) now has 0 HP remaining.\n\n";
            echo "</br>";
            echo "</br>";
            echo "{$target->name} has fainted!\n\n";
            return true;
        } else {
            echo "{$target->name} now has {$target->health} HP remaining.\n\n";
            echo "</br>";
            echo "</br>";
            return false;
        }
    
        return false;
    }

    public static function getPopulation()
    {
        return self::$population;
    }
}

?>