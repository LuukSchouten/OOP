<?php

require_once 'Pokemon.php';

$attacks_pikachu = [
    ['name' => 'Electring Ring', 'type' => 'lightning', 'damage' => 50],
    ['name' => 'Pika Punch', 'type' => 'normal', 'damage' => 20]
];

$attacks_charmeleon = [
    ['name' => 'Head Butt', 'type' => 'normal', 'damage' => 10],
    ['name' => 'Flare', 'type' => 'fire', 'damage' => 30]
];

$weakness = ['type' => 'fire', 'multiplier' => 1.5];
$resistance = ['type' => 'fighting', 'value' => 20];

$pikachu = new Pokemon('Pikachu', 'lightning', 60, $attacks_pikachu, $weakness, $resistance);
$charmeleon = new Pokemon('Charmeleon', 'fire', 60, $attacks_charmeleon, ['type' => 'water', 'multiplier' => 2], ['type' => 'lightning', 'value' => 10]);

echo "The battle begins between {$pikachu->name} ({$pikachu->type}) and {$charmeleon->name} ({$charmeleon->type})!\n\n";

echo "</br>";
echo "</br>";

$battle_end = false;
while (!$battle_end) {
    while (!$battle_end) {
        // Pikachu attacks Charmeleon
        $battle_end = $pikachu->attack($pikachu->attacks[0], $charmeleon);
        if ($battle_end) {
            break;
        }
        // Charmeleon attacks Pikachu
        $battle_end = $charmeleon->attack($charmeleon->attacks[1], $pikachu);
        if ($battle_end) {
            break;
        }
    }
}

echo "\nBattle has ended! ";
if ($pikachu->health <= 0) {
    echo "{$charmeleon->name} has won!\n";
} else {
    echo "{$pikachu->name} has won!\n";
}

?>
