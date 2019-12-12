<?php
declare(strict_types=1);

class User
{
    public $name;
    private $email;

    public function __construct(string $_name, string $_email)
    {
        $this->name = $_name;
        $this->email = $_email;
    }

    protected function getName() : string
    {
        return $this->name;
    }
    protected function getEmail() : string
    {
        return $this->email;
    }
    /*
    public function getId() : string
    {
        return $this->id;
    }
    */
    protected function setId($_id) : int
    {
        $this->id= $_id;
    }
}
//echo "from user"."<br>";