<?php // 
namespace Wypozyczalnia\TestBundle\Entity;
use Symfony\Component\Form\FormView;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="borrows")
 */
class Borrows {
    
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idBorrow;
    

    /**
     * @ORM\Column(type="integer", length=255)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 255
     * )
     */
    private $idUser;
    
    /**
     * @ORM\Column(type="integer", length=255)
     * 
     * @Assert\NotBlank

     */
    private $idFilm;
   
    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank
     * )
     * @Assert\Length(
     * max = 255
     * )
     */
    private $type;     
    

    /**
     * Get idBorrow
     *
     * @return integer 
     */
    public function getIdBorrow()
    {
        return $this->idBorrow;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return Borrows
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idFilm
     *
     * @param integer $idFilm
     * @return Borrows
     */
    public function setIdFilm($idFilm)
    {
        $this->idFilm = $idFilm;

        return $this;
    }

    /**
     * Get idFilm
     *
     * @return integer 
     */
    public function getIdFilm()
    {
        return $this->idFilm;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Borrows
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
