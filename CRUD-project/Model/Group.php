<?php
declare(strict_types=1);

//CLASS
class Group
{
    private $name;
    private $location;

    public function __construct(string $name, string $location)
    {
        $this->name = $name;
        $this->name = $location;
    }

    public function getName() : string
    {
        return $this->name;
    }
    public function getLocation() : string
    {
        return $this->location;
    }
}