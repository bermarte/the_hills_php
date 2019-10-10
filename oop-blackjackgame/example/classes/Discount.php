<?php
declare(strict_types=1);

class Discount
{
    const FIXED = 'FIXED';
    const VARIABLE = 'VARIABLE';

    private $type;
    private $value;

    public function __construct(string $type, float $value)
    {
        if(!in_array($type, [self::FIXED, self::VARIABLE])) {
            die('Invalid type');
        }

        $this->type = $type;
        $this->value = $value;
    }

    public function getType() : string
    {
        return $this->type;
    }

    public function getValue() : float
    {
        return $this->value;
    }

    public function applyDiscount(float $price) : float
    {
        if ($this->getType() === Self::FIXED) {
            $price -= $this->getValue();
        } else {
            $price -= $price * $this->getValue() / 100;
        }
        return $price;
    }

}