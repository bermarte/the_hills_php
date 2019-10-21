<?php
declare(strict_types=1);
class Group{
    private $id;
    private $name;
    private $variable_discount;
    private $fixed_discount;
    private $group_id;

    public function __construct(int $_id, string $_name, int $_variable_discount, int $_fixed_discount, int $_group_id)
    {
        $this->id = $_id;
        $this->name = $_name;
        $this->fixed_discount = $_fixed_discount;
        $this->variable_discount = $_variable_discount;
        $this->group_id = $_group_id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFixedDiscount(): int
    {
        return $this->fixed_discount;
    }
    public function getVariableDiscount(): int
    {
        return $this->variable_discount;
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
