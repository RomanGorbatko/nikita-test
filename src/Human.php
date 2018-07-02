<?php

namespace RG\AnimalShelter;

/**
 * Class Human
 * @package RG\AnimalShelter
 */
class Human
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Animal[]
     */
    private $pets;

    /**
     * Type of desired animal
     *
     * @var int|null
     */
    private $want;

    /**
     * Human constructor.
     * @param string $name
     * @param int|null $want
     */
    public function __construct($name, $want = null)
    {
        $this->name = $name;
        $this->want = $want;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Animal[]
     */
    public function getPets()
    {
        return $this->pets;
    }

    /**
     * @param Animal $pet
     */
    public function putPet($pet)
    {
        $this->pets[] = $pet;
    }

    /**
     * @return int|null
     */
    public function getWant()
    {
        return $this->want;
    }
}