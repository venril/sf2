<?php

namespace AstonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Todo
 *
 * @ORM\Table(name="todo")
 * @ORM\Entity(repositoryClass="AstonBundle\Repository\TodoRepository")
 */
class Todo
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
     * 
     * @Assert\NotBlank()
     * @ORM\Column(name="txt", type="string", length=255)
     */
    private $txt;

    /**
     * @var bool
     * 
     * @ORM\Column(name="done", type="boolean")
     */
    private $done;


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
     * Set txt
     *
     * @param string $txt
     *
     * @return Todo
     */
    public function setTxt($txt)
    {
        $this->txt = $txt;

        return $this;
    }

    /**
     * Get txt
     *
     * @return string
     */
    public function getTxt()
    {
        return $this->txt;
    }

    /**
     * Set done
     *
     * @param boolean $done
     *
     * @return Todo
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return bool
     */
    public function getDone()
    {
        return $this->done;
    }
}

