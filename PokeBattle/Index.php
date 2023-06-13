<?php
require_once 'EnergyType.php';
require_once 'Attack.php';
require_once 'Weakness.php';
require_once 'Resistance.php';
require_once 'Pokemon.php';
require_once 'Pikachu.php';
require_once 'Charmeleon.php';
require_once 'Battle.php';

$pikachu = new Pikachu("Pikachu");
$charmeleon = new Charmeleon("Charmeleon");

// Pikachu attacks Charmeleon
$attackIndex = 0; // Assuming the first attack is used
$damage = Battle::attack($pikachu, $charmeleon, $attackIndex);

echo "Health of Charmeleon after being attacked by Pikachu: " . Battle::getHealth($charmeleon) . "<br>";
echo "Damage inflicted: " . $damage . "<br>";

// Charmeleon attacks Pikachu
$attackIndex = 0; // Assuming the first attack is used
$damage = Battle::attack($charmeleon, $pikachu, $attackIndex);

echo "Health of Pikachu after being attacked by Charmeleon: " . Battle::getHealth($pikachu) . "<br>";
echo "Damage inflicted: " . $damage . "<br>";
?>
