<?php

namespace Wypozyczalnia\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opinions
 *
 * @ORM\Entity
 * @ORM\Table(name="Opinions")
 */
class Opinions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="opinion", type="string", length=1000)
     */
    private $opinion;

    /**
    * @ORM\ManyToOne(targetEntity="Register", inversedBy="Opinions")
    * @ORM\JoinColumn(name="idUser", referencedColumnName="id")
    */
     protected $User;
     
     
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Opinions
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set opinion
     *
     * @param string $opinion
     * @return Opinions
     */
    public function setOpinion($opinion)
    {
        $this->opinion = $opinion;

        return $this;
    }

    /**
     * Get opinion
     *
     * @return string 
     */
    public function getOpinion()
    {
        return $this->opinion;
    }

    /**
     * Set User
     *
     * @param \Wypozyczalnia\TestBundle\Entity\Register $user
     * @return Opinions
     */
    public function setUser(\Wypozyczalnia\TestBundle\Entity\Register $user = null)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get User
     *
     * @return \Wypozyczalnia\TestBundle\Entity\Register 
     */
    public function getUser()
    {
        return $this->User;
    }
}
