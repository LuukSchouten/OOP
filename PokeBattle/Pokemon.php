<?php 

class Pokemon {

    protected  $name;
    protected  $type;
    protected  $hp;
    protected  $attack1;
    protected  $attack2;
    protected  $weakness;
    protected  $resistance;
    protected static $count;

    // Create function to get the total pokemons
    public static function getPopulation() {
        if(Pokemon::$count >1) {
            echo "There are ". Pokemon::$count. " pokemons!";
        } else if(Pokemon::$count == 1) {
            echo "There is only ". Pokemon::$count. " pokemon!";
        }

        if(Pokemon::$count == 0) {
            echo "There are no pokemons left...";
        }
    }
  
    public function attack($attackId, $attackedPokemon) {
        if($attackId == 0) {
            $attackersAttack = $this->attack1;
        }

        if($attackId == 1) {
            $attackersAttack = $this->attack2;
        }
        echo "<br>";
        echo $this->name. " has ". $this->health. " hp";
        echo "<br>";
        echo $attackedPokemon->name. " has ". $attackedPokemon->health. " hp";
        echo "<br>";
        echo $this->name. " used ".  $attackersAttack->attackName. " on ". $attackedPokemon->name. "!";
        echo "<br>";

        if($this->type == $attackedPokemon->weakness->type) {
            echo "It was super effective! ";
            $attackersAttack->damage = $attackersAttack->damage * $attackedPokemon->weakness->modifier;
        } 

        if($this->type != $attackedPokemon->weakness->type) {
            echo "It was not very effective... ";
            $attackersAttack->damage = $attackersAttack->damage - $attackedPokemon->resistance->modifier;
        }

        echo "<br>";
        echo $attackedPokemon->name. " took ". $attackersAttack->damage. " damage!";

        $attackedPokemon->health = $attackedPokemon->health - $attackersAttack->damage;

        if($attackedPokemon->health <= 0 ) {
            $this::$count--;
            echo "<br>";
            echo $attackedPokemon->name. "'s health dropped to 0!";
            echo "<br>";
            echo $attackedPokemon->name. " has fainted!";
            echo "<br>";
            echo $this->name. " has won the battle!";
        } else {
            echo "<br>";
            echo $attackedPokemon->name. " has ". $attackedPokemon->health. " hp";
        }
        echo "<br>";

    }
}

class Charmeleon extends Pokemon{
    public function __construct(){

        $name = 'Charmeleon';
        $type =  'Fire';
        $health = "60";
        $attack1 = new Attack('Head Butt', 10);
        $attack2 = new Attack('Ember', 30);
        $weakness = new Weakness('Water', 2);
        $resistance = new Resistance('Electric', 10);
        
        $this->name = $name;
        $this->type = $type;
        $this->health = $health;
        $this->attack1 = $attack1;
        $this->attack2 = $attack2;
        $this->weakness = $weakness;
        $this->resistance = $resistance;
        self::$count++;

    }
}

class Pikachu extends Pokemon{
    public function __construct(){

        $name = 'Pikachu';
        $type =  'Electric';
        $health = '60';
        $attack1 = new Attack('Electro Ball', 50);
        $attack2 = new Attack('Tackle', 20);
        $weakness = new Weakness('Fire', 2);
        $resistance = new Resistance('Fighting', 20);

        $this->name = $name;
        $this->type = $type;
        $this->health = $health;
        $this->attack1 = $attack1;
        $this->attack2 = $attack2;
        $this->weakness = $weakness;
        $this->resistance = $resistance;
        self::$count++;

    }
}

class Attack {

    public $attackName;
    public $damage;
    
    public function __construct($attackName, $damage){
        $this->attackName = $attackName;
        $this->damage = $damage; 
    }

}

class Weakness {

    public $type;
    public $modifier;

    public function __construct($type, $modifier)
    {
        $this->type = $type;
        $this->modifier = $modifier;
    }

}

class Resistance {

    public $type;
    public $modifier;

    public function __construct($type, $modifier) {
        $this->type = $type;
        $this->modifier = $modifier;
    }

}



