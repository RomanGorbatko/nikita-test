<?php

require __DIR__.'/vendor/autoload.php';

use RG\AnimalShelter\Types;
use RG\AnimalShelter\Helpers\Logger;
use RG\AnimalShelter\Shelter;
use RG\AnimalShelter\Animal;
use RG\AnimalShelter\Human;

$shelter = new Shelter('LakeLand');

Logger::info('Welcome to "' . $shelter->getName() . '" animal shelter ' . implode(Types::$ICONS, ' '));
Logger::info('Animals Available: ' . count($shelter->getAnimals()));

$humans = [
    new Human('John', Types::$TORTOISE),
    new Human('Andrew'),
    new Human('Steve', Types::$CAT),
    new Human('Donald'),
];

$animals = [
    new Animal(Types::$TORTOISE, 'Zeus', 10),
    new Animal(Types::$DOG, 'Apollo', 2),
    new Animal(Types::$DOG, 'George', 3),
    new Animal(Types::$CAT, 'Henry', 5),
    new Animal(Types::$CAT, 'Teddy', 1),
    new Animal(Types::$DOG, 'Gus', 1),
];

foreach ($animals as $animal) {
    /** @var Animal $animal */

    Logger::info('An animal got into the shelter: ' . Types::$ICONS[$animal->getType()]);

    $shelter->putAnimal($animal);
}

Logger::listOfAnimals($shelter);

foreach ($humans as $human) {
    /** @var Human $human */

    try {
        $animal = $shelter->leaveAnimal($human->getWant());
        $human->putPet($animal);

        Logger::warning('Human ' . $human->getName() . ' get ' . Types::$ICONS[$animal->getType()] . ' by Name ' . $animal->getName());
    } catch (\Exception $exception) {
        Logger::warning($exception->getMessage());
    }
}

Logger::listOfAnimals($shelter);
