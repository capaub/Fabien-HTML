<?php

namespace Blog\Model;

class Category
{
    /** @var string */
    public string $name;

    /**
     * @param string $sName
     */
    public function __construct(string $sName)
    {
        $this->name = $sName;
        return self::getName();
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
}