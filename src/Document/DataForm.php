<?php
namespace App\Document; 
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert; 

/** @ODM\Document */
class DataForm
{

    /** @ODM\Id */
    private $id;

    /** @ODM\Field(type="string") 
        * @Assert\NotBlank() 
    */
    private $Nombre;

    /** @ODM\Field(type="string") 
        * @Assert\Email( 
        * message = "The email '{{ value }}' is not a valid email.", 
        * checkMX = true * )
    */
    private $Correo;

    /** @ODM\Field(type="string") 
        * @Assert\NotBlank() 
    */
    private $Telefono;
    
    /** @ODM\Field(type="string") 
        * @Assert\Length( 
            * min = 1, 
            * max = 1000, 
            * minMessage = "Your Message must be at least {{ limit }} characters long", 
            * maxMessage = "Your Message cannot be longer than {{ limit }} characters" 
        * )
    */
    private $Mensaje;

     /** 
      * Get id 
      * 
      * @return integer 
    */ 
    public function getId() { 
    return $this->id; 
    }  
  
    /** 
        * Set Nombre 
        * 
        * @param string $Nombre 
        * 
        * @return DataForm 
    */     
    public function setNombre($Nombre) { 
        $this->Nombre = $Nombre;  
        return $this; 
    }  
    
    /** 
        * Get Nombre 
        * 
        * @return string 
    */ 
    
    public function getNombre() { 
        return $this->Nombre; 
    } 

    /** 
        * Set Correo 
        * 
        * @param string $Correo 
        * 
        * @return DataForm 
    */     
    public function setCorreo($Correo) { 
        $this->Correo = $Correo;  
        return $this; 
    }  
    
    /** 
        * Get Correo 
        * 
        * @return string 
    */ 
    
    public function getCorreo() { 
        return $this->Correo; 
    }
    
    /** 
        * Set Telefono 
        * 
        * @param string $Telefono 
        * 
        * @return DataForm 
    */     
    public function setTelefono($Telefono) { 
        $this->Telefono = $Telefono;  
        return $this; 
    }  
    
    /** 
        * Get Telefono 
        * 
        * @return string 
    */ 
    
    public function getTelefono() { 
        return $this->Telefono; 
    }

     
    /** 
        * Set Mensaje 
        * 
        * @param string $Mensaje 
        * 
        * @return DataForm 
    */     
    public function setMensaje($Mensaje) { 
        $this->Mensaje = $Mensaje;  
        return $this; 
    }  
    
    /** 
        * Get Mensaje 
        * 
        * @return string 
    */ 
    
    public function getMensaje() { 
        return $this->Mensaje; 
    }
}