<?php

namespace RG\AnimalShelter;

/**
 * Class Shelter
 * @package RG\AnimalShelter
 */
class Shelter
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var Animal[]
     */
    public $animals;

    /**
     * Shelter constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Animal $animal
     * @return self
     */
    public function putAnimal(Animal $animal)
    {
        $this->animals[] = $animal;

        return $this;
    }

    /**
     * @param bool $sort
     * @return Animal[]
     */
    public function getAnimals($sort = false)
    {
        if ($sort) {
            return $this->sortAnimals($this->animals);
        }

        return $this->animals;
    }

    /**
     * @param null $type
     * @return mixed|Animal
     * @throws \Exception
     */
    public function leaveAnimal($type = null)
    {
        $animals = $this->getAnimals();

        if ($type !== null) {
            $animals = $this->filterAnimals($type);
        }

        $passed = $animals[0];

        if (!$passed instanceof Animal) {
            throw new \Exception('There is no animal');
        }

        $this->removeAnimal($passed);

        return $passed;
    }

    /**
     * @param Animal $animal
     */
    private function removeAnimal(Animal $animal)
    {
        $this->animals = array_values(array_filter($this->animals, function ($item) use ($animal) {
            /** @var Animal $item */
            return $item->getName() !== $animal->getName();
        }));
    }

    /**
     * @param int $type
     * @return array
     */
    private function filterAnimals($type)
    {
        return array_values(array_filter($this->getAnimals(), function ($item) use ($type) {
            /** @var Animal $item */
            return $item->getType() === $type;
        }));
    }

    /**
     * @param array $animals
     * @return array
     */
    private function sortAnimals($animals)
    {
        usort($animals, function(Animal $animal1, Animal $animal2) {
            return strcmp($animal1->getName(), $animal2->getName());
        });

        return $animals;
    }
}