<?php

namespace AppBundle\Entity;

/**
 * Class Product
 * @package AppBundle\Entity
 */
class Product
{
    /**
     *
     */
    const FOOD_PRODUCT = 'food';

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $type;

    /**
     * @var
     */
    private $price;

    /**
     * Product constructor.
     * @param $name
     * @param $type
     * @param $price
     */
    public function __construct($name, $type, $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function computeTVA()
    {
        if ($this->price < 0) {
            throw new \LogicException('The TVA cannot be negative.');
        }

        if (self::FOOD_PRODUCT == $this->type) {
            return $this->price * 0.055;
        }

        return $this->price * 0.196;
    }
}