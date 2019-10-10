<?php
declare(strict_types=1);

class Product
{
    const MIN_PRICE = 1;

    private $name;
    private $description;
    private $image;
    private $price;
    private $discount;
    private $vat;

    public function __construct(
        string $name,
        float $price,
        Vat $vat,
        Discount $discount=null
    )
    {
        $this->name = $name;
        $this->description = 'Lorum ipsum';
        $this->image = $name . '.jpg';
        $this->price = $price;
        $this->discount = $discount;
        $this->vat = $vat;
    }

    public function setPrice(float $price) {
        $this->price = max(1, $price);
    }

    public function getPrice() : float {
        return $this->price;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function getDiscount() :? Discount
    {
        return $this->discount;
    }

    public function getVat() : Vat
    {
        return $this->vat;
    }

    public function calculatePrice() : float
    {
        $price = $this->price;
        if($this->getDiscount()) {
            $price = $this->getDiscount()->applyDiscount($price);
        }

        return max(self::MIN_PRICE, $price);
    }
}