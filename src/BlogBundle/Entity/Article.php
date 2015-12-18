<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=5, max=255)
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=5, max=300)
     * @ORM\Column(name="teaser", type="text")
     */
    private $teaser;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     * @ORM\Column(name="content", type="text")
     */
    private $content;
    
    /**
     * @var \Date
     *
     *  @Assert\Date()
     * @ORM\Column(name="createdAt", type="date")
     */
    private $createdAt;

    /**
     * @var BlogBundle\Entity\Category
     * @ORM\OneToOne(targetEntity="BlogBundle\Entity\Category", cascade={"persist"})
     */
    
    private $category;
    
     /**
     * Get Category
     *
     *  @return \BlogBundle\Entity\Article
     */
    
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set category
     *
     * @param \BlogBundle\Entity\Category $category
     *
     * @return \BlogBundle\Entity\Article
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

        /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set teaser
     *
     * @param string $teaser
     *
     * @return Article
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;

        return $this;
    }

    /**
     * Get teaser
     *
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Article
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
