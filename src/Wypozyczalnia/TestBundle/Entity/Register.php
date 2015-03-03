<?php // 
namespace Wypozyczalnia\TestBundle\Entity;
use Symfony\Component\Form\FormView;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class Register {
    
    
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
     * @Assert\Regex(
     *      pattern = "/^[a-zA-Z]+$/",
     *      message = "Musisz podać login"
     * )
     * 
     * @Assert\Length(
     *      max = 255
     * )
     */
    private $name;
    
    
    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Email
     */
    private $email;
    
    
    
    /**
     * @ORM\Column(type="date", nullable=true)
     * 
     * @Assert\Date
     */
    private $birthdate;
    
    
    /**
     * @ORM\Column(type="string", length=2)
     * 
     * @Assert\NotBlank
     */
    private $country;
    
    
    /**
     * @ORM\Column(type="string", length=10)
     * 
     * @Assert\NotBlank
     */
    private $password;
    
  
    
    
    public function getPaymentFile() {
        return $this->paymentFile;
    }

    public function setPaymentFile($paymentFile) {
        $this->paymentFile = $paymentFile;
        return $this;
    }

    public function save($savePath){
        
        $paramsNames = array('name', 'email', 'birthdate', 'country');
        $formData = array();
        foreach ($paramsNames as $name){
            $formData[$name] = $this->{$name};
        }

        $randVal = rand(1000, 9999);
        $dataFileName = sprintf('data_%d.txt', $randVal);

        file_put_contents($savePath.$dataFileName, print_r($formData, TRUE));

        $file = $this->getPaymentFile();
        if(NULL !== $file){
            $newName = sprintf('file_%d.%s', $randVal, $file->guessExtension());
            $file->move($savePath, $newName);
        }
    }


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
     * @return Register
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
     * Set email
     *
     * @param string $email
     * @return Register
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Register
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Register
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Register
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
}
