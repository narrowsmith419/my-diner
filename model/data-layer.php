<?php

/**
 * acceses data needed for the diner app
 */
class DataLayer
{
    /**
     * return array of condiments
     * @return string[]
     */
    static function getCondiments()
    {
        return array('mayonnaise', 'mustard', 'ketchup', 'salsa', 'kim chi', 'sriracha');
    }

    /**
     * return array of meal options
     * @return string[]
     */
    static function getMeals()
    {
        return array('breakfast', 'lunch', 'dinner');
    }
}

