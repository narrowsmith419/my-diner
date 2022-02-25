<?php


class Order
{
    //classes and functions go on different lines, decisions and loops, {} same line
    private $_food;
    private $_meal;
    private $_condiments;
    private $_drinks;

    /**
     * default constructor
     */
    public function __construct($_food, $_meal, $_condiments, $_drinks)
    {
        $this->_food = "";
        $this->_meal = "";
        $this->_condiments = "";
        $this->_drinks = "";

    }


    /**
     * return food that was ordered
     * @return string
     */
    public function getFood()
    {
        return $this->_food;
    }

    /**
     * set food that was ordered
     * @param string $food
     */
    public function setFood($food)
    {
        $this->_food = $food;
    }

    /**
     * get meal that was ordered
     * @return string
     */
    public function getMeal()
    {
        return $this->_meal;
    }

    /**
     * @param string $meal
     */
    public function setMeal($meal)
    {
        $this->_meal = $meal;
    }

    /**
     * @return string
     */
    public function getCondiments()
    {
        return $this->_condiments;
    }

    /**
     * @param string $condiments
     */
    public function setCondiments($condiments)
    {
        $this->_condiments = $condiments;
    }

    /**
     * @return string
     */
    public function getDrinks()
    {
        return $this->_drinks;
    }

    /**
     * @param string $drinks
     */
    public function setDrinks($drinks)
    {
        $this->_drinks = $drinks;
    }




}