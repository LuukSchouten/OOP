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
        } elseif ($type == $target->resistance['type']) {
            $damage -= $target->resistance['value'];
        }

        $target->health -= $damage;
        if ($target->health <= 0) {
            self::$population--;
            return true;
        }
        return false;
    }

    public static function getPopulation()
    {
        return self::$population;
    }
}

?>