<?php
require_once 'EnergyType.php';
require_once 'Attack.php';
require_once 'Weakness.php';
require_once 'Resistance.php';
require_once 'Pokemon.php';
require_once 'Pikachu.php';
require_once 'Charmeleon.php';
require_once 'Battle.php';
require_once 'Attack.php';

$pikachu = new Pikachu("Pikachu");
$charmeleon = new Charmeleon("Charmeleon");

while (Battle::getHealth($pikachu) > 0 && Battle::getHealth($charmeleon) > 0) {
    // Pikachu attacks Charmeleon
    $pikachuAttackIndex = rand(0, count($pikachu->getAttacks()) - 1);
    $damage = Battle::attack($pikachu, $charmeleon, $pikachuAttackIndex);

    $pikachuAttackName = $pikachu->getAttacks()[$pikachuAttackIndex]->getName();

    echo "Pikachu used " . $pikachuAttackName . "!" . "<br>";
    echo "Charmeleon took " . $damage . " damage." . "<br>";
    echo "Health of Charmeleon: " . Battle::getHealth($charmeleon) . "<br>";
    echo "<br>";

    // Check if Charmeleon has fainted
    if (Battle::getHealth($charmeleon) <= 0) {
        echo "Charmeleon has fainted!" . "<br>";
        break; // Exit the loop if Charmeleon has fainted
    }

    // Charmeleon attacks Pikachu
    $charmeleonAttackIndex = rand(0, count($charmeleon->getAttacks()) - 1);
    $damage = Battle::attack($charmeleon, $pikachu, $charmeleonAttackIndex);

    $charmeleonAttackName = $charmeleon->getAttacks()[$charmeleonAttackIndex]->getName();

    echo "Charmeleon used " . $charmeleonAttackName . "!" . "<br>";
    echo "Pikachu took " . $damage . " damage." . "<br>";
    echo "Health of Pikachu: " . Battle::getHealth($pikachu) . "<br>";
    echo "<br>";

    // Check if Pikachu has fainted
    if (Battle::getHealth($pikachu) <= 0) {
        echo "Pikachu has fainted!" . "<br>";
        break; // Exit the loop if Pikachu has fainted
    }
}

?>
