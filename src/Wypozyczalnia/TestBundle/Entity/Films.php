<?php // 
namespace Wypozyczalnia\TestBundle\Entity;
use Symfony\Component\Form\FormView;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="films")
 */
class Films {
    
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 255
     * )
     */
    private $title;
    
    /**
     * @ORM\Column(type="integer")
     * 
     * @Assert\NotBlank

     */
    private $production_year;
   
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
     * @ORM\Column(type="integer")
     */
    private $quantity;       
    
    /**
     * @ORM\Column(type="integer")
     */
    private $price;   
    
    
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
     * Set title
     *
     * @param string $title
     * @return Films
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
     * Set production_year
     *
     * @param integer $production_year
     * @return Films 
     */
    public function setProduction_year($production_date)
    {
        $this->production_date = $production_date;

        return $this;
    }

    /**
     * Get production_year
     *
     * @return integer 
     */
    public function getProduction_year()
    {
        return $this->production_year;
    }
    
    
    
     /**
     * Set type
     *
     * @param string $type
     * @return Films
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
   
    
    
     /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Films
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }        
    
     /**
     * Set price
     *
     * @param integer $price
     * @return Films
     */
    public function setPrice($quantity)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }      
    
    

    /**
     * Set production_year
     *
     * @param integer $productionYear
     * @return Films
     */
    public function setProductionYear($productionYear)
    {
        $this->production_year = $productionYear;

        return $this;
    }

    /**
     * Get production_year
     *
     * @return integer 
     */
    public function getProductionYear()
    {
        return $this->production_year;
    }
}
