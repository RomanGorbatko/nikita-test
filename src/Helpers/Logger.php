<?php

namespace RG\AnimalShelter\Helpers;

use RG\AnimalShelter\Animal;
use RG\AnimalShelter\Shelter;
use RG\AnimalShelter\Types;

/**
 * Class Logger
 * @package RG\AnimalShelter\Helpers
 */
class Logger
{
    /**
     * @param $message
     */
    public static function info($message)
    {
        printf("| Info: | %-30s |\n", $message);
    }

    /**
     * @param $message
     */
    public static function warning($message)
    {
        printf("| Warning: | %-30s |\n", $message);
    }

    /**
     * @param int $key
     * @param Animal $animal
     */
    public static function exposeAnimal($key, Animal $animal)
    {
        self::warning('Animal #: ' . ($key + 1));
        self::warning('Animal Type: ' . Types::$ICONS[$animal->getType()]);
        self::warning('Animal Name: ' . $animal->getName());
        self::warning('Animal Age: ' . $animal->getAge());
    }

    /**
     * @param Shelter $shelter
     */
    public static function listOfAnimals(Shelter $shelter)
    {
        self::info('Animals Available: ' . count($shelter->getAnimals()));
        self::info('List Of Animals: ');

        self::info(str_repeat('-', 50));

        foreach ($shelter->getAnimals(true) as $key => $animal) {
            self::exposeAnimal($key, $animal);
        }

        self::info(str_repeat('-', 50));
    }
}