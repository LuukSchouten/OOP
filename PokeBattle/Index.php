<?php

require 'Pokemon.php';

$Charmeleon = new Charmeleon();
$Pikachu = new Pikachu();

// display total pokemon
Pokemon::getPopulation();

echo "<br>";

echo $Pikachu->attack(0, $Charmeleon);
echo $Charmeleon->attack(0, $Pikachu);
echo $Pikachu->attack(0, $Charmeleon);


echo "<br>";

Pokemon::getPopulation();







