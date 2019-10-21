<?php
declare(strict_types=1);
class Customer{
    private $id;
    private $name;
    private $group_id;
    public function __construct(int $_id, string $_name, int $_group_id)
    {
        $this->id = $_id;
        $this->name = $_name;
        $this->group_id = $_group_id;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getGroupId(): int
    {
        return $this->group_id;
    }
    public function setGroupId(int $group_id): void
    {
        $this->group_id = $group_id;
    }
}