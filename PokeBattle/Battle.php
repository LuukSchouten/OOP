<?php

class Battle
{
    public static function attack($attacker, $defender, $attackIndex)
    {
        $attack = $attacker->getAttacks()[$attackIndex];
        $damage = $attack->getDamage();

        // Check if the defender has a weakness
        if ($defender->getWeakness() !== null) {
            $weaknessEnergyType = $defender->getWeakness()->getEnergyType();
            $weaknessMultiplier = $defender->getWeakness()->getMultiplier();

            // Check if the attack's energy type matches the defender's weakness
            if ($attack->getEnergyType()->getName() === $weaknessEnergyType->getName()) {
                $damage *= $weaknessMultiplier;
            }
        }

        //Check if the defender has a Resistance
        if ($defender->getResistance() !== null) {
            $resistanceEnergyType = $defender->getResistance()->getEnergyType();
            $resistanceValue = $defender->getResistance()->getValue();

            // Check if the attack's energy type matches the defender's resistance
            if ($attack->getEnergyType()->getName() === $resistanceEnergyType->getName()) {
            $damage -= $resistanceValue;
            }
        }

        // Apply damage to the defender
        $defender->takeDamage($damage);

        return $damage;
    }
    public static function getHealth($pokemon)
    {
        return $pokemon->health;
    }

    
}


?>