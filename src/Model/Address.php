<?php

namespace Blog\Model;

class Address
{
    /** @var string */
    private string $street;
    /** @var int */
    private int $postalCode;
    /** @var string */
    private string $city;
    /** @var string */
    private string $country;

    /**
     * @param string $sStreet
     * @param string $iPostalCode
     * @param string $sCity
     * @param string $sCountry
     */
    public function __construct(string $sStreet, string $iPostalCode, string $sCity, string $sCountry)
    {
        $this->street = $sStreet;
        $this->postalCode = $iPostalCode;
        $this->city = $sCity;
        $this->country = $sCountry;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Address
     */
    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostalCode(): int
    {
        return $this->postalCode;
    }

    /**
     * @param int $postalCode
     * @return Address
     */
    public function setPostalCode(int $postalCode): Address
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Address
     */
    public function setCountry(string $country): Address
    {
        $this->country = $country;
        return $this;
    }

}