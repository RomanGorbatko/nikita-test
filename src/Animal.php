<?php

namespace RG\AnimalShelter;

/**
 * Class Animal
 * @package RG\AnimalShelter
 */
class Animal
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    private $age;

    /**
     * Animal constructor.
     * @param string $type
     * @param string $name
     * @param int $age
     */
    public function __construct($type, $name, $age)
    {
        $this->type = $type;
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }
}