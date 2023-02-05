<?php

namespace Blog\Model;

use Blog\Model\Category;
use DateTime;

require 'Category.php';

class Article
{
    /** @var int */
    public const STATUS_PUBLISHED = 1;
    /** @var int */
    public const STATUS_DRAFTED = 2;
    /** @var int */
    public const STATUS_DELETED = 3;

    public const STATUS = [
        self::STATUS_PUBLISHED => 'Publié',
        self::STATUS_DRAFTED => 'Brouillon',
        self::STATUS_DELETED => 'Supprimé',
    ];

    /** @var string */
    private string $title;
    /** @var string */
    private string $content;
    /** @var int */
    private Category $category;
    /** @var DateTime */
    private int $status;
    /** @var Category */
    private DateTime $createdAt;

    /**
     * @param string $sTitle
     * @param string $sContent
     * @param Category $oCategory
     * @param int $iStatus
     */
    public function __construct(string $sTitle, string $sContent, Category $oCategory, int $iStatus = self::STATUS_DRAFTED)
    {
        $this->title = $sTitle;
        $this->content = $sContent;
        $this->category = $oCategory;

        $this->status = $iStatus;
        $this->createdAt = new DateTime('now');
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */

    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Article
     */
    public function setContent(string $content): Article
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return Article
     */
    public function setStatus(int $status): Article
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Article
     */
    public function setCategory(Category $category): Article
    {
        $this->category = $category;
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
     * @return Article
     */
    public function setCreatedAt(DateTime $createdAt): Article
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}