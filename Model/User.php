<?php

namespace Blog\Model;

use Blog\Model\Address;
use DateTime;

class User
{
    /** @var string */
    private string $userName;
    /** @var string */
    private string $email;
    /** @var string */
    private string $firstName;
    /** @var string */
    private string $lastName;
    /** @var Address */
    private Address $address;
    /** @var string */
    private string $password;
    /** @var int */
    private int $role;
    /** @var DateTime */
    private DateTime $birthAt;
    /** @var DateTime */
    private DateTime $createdAt;
    /** @var DateTime */
    private DateTime $updatedAt;
    /** @var DateTime */
    private DateTime $connectedAt;
    /** @var int */
    private int $id;

    public const ROLE_ADMIN = 1;
    public const ROLE_MANAGER = 2;
    public const ROLE_USER = 3;

    public const ROLE_CONF =
        [
            self::ROLE_ADMIN => ['name' => 'Admin'],
            self::ROLE_MANAGER => ['name' => 'Manager'],
            self::ROLE_USER => ['name' => 'User'],
        ];

    /**
     * @param string $userName
     * @param string $sEmail
     * @param DateTime $dBirthAt
     * @param string $sPassword
     */
    public function __construct(string $userName, string $sEmail, DateTime $dBirthAt, string $sPassword)
    {
        $this->userName = $userName;
        $this->email = $sEmail;
        $this->birthAt = $dBirthAt;
        $this->password = $sPassword;
        $this->connectedAt = new DateTime('now');
        $this->createdAt = new DateTime('now');
        $this->role = self::ROLE_USER;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return User
     */
    public function setUserName(string $userName): User
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return User
     */
    public function setAddress(Address $address): User
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param int $role
     * @return User
     */
    public function setRole(int $role): User
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getBirthAt(): DateTime
    {
        return $this->birthAt;
    }

    /**
     * @param DateTime $birthAt
     * @return User
     */
    public function setBirthAt(DateTime $birthAt): User
    {
        $this->birthAt = $birthAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return User
     */
    public function setCreatedAt(DateTime $createdAt): User
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt(DateTime $updatedAt): User
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getConnectedAt(): DateTime
    {
        return $this->connectedAt;
    }

    /**
     * @param DateTime $connectedAt
     * @return User
     */
    public function setConnectedAt(DateTime $connectedAt): User
    {
        $this->connectedAt = $connectedAt;
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
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }


}