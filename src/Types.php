<?php

namespace RG\AnimalShelter;

/**
 * Class Types
 * @package RG\AnimalShelter
 */
class Types
{
    /**
     * Types ID
     */
    public static $DOG = 1;
    public static $CAT = 2;
    public static $TORTOISE = 3;

    /**
     * Types name
     */
    public static $NAMES = [
        1 => 'Dog',
        2 => 'Cat',
        3 => 'Tortoise'
    ];

    public static $ICONS = [
        1 => '🐶',
        2 => '😻',
        3 => '🐢',
    ];
}