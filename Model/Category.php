<?php

namespace Blog\Model;

class Category
{
    /** @var string */
    public string $name;
    /** @var int */
    public int $id;

    /**
     * @param string $sName
     */
    public function __construct(string $sName)
    {
        $this->name = $sName;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName(string $name): Category
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Category
     */
    public function setId(int $id): Category
    {
        $this->id = $id;
        return $this;
    }

}