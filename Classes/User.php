<?php
class User
{
    private $_Id;
    private $_Username;
    private $_Password;
    private $_Role;

    public function __construct(array $ligne){
        $this->hydrate($ligne);
    }

    public function hydrate(array $ligne){
        foreach ($ligne as $key => $value) {
             $method = "set".ucfirst($key);
            if (method_exists($this, $method)){
                //le dollar on appel la methode dynamiquement car il est dans la variable method 
                $this->$method($value);
            }
        }
    }
    public function getId()
    {
        return $this->_Id;
    }
    public function setId($Id)
    {
        $this->_Id = $Id;

        return $this;
    }

    /**
     * Get the value of _Username
     */ 
    public function getUsername()
    {
        return $this->_Username;
    }

    /**
     * Set the value of _Username
     *
     * @return  self
     */ 
    public function setUsername($_Username)
    {
        $this->_Username = $_Username;

        return $this;
    }

    /**
     * Get the value of _Password
     */ 
    public function getPassword()
    {
        return $this->_Password;
    }

    /**
     * Set the value of _Password
     *
     * @return  self
     */ 
    public function setPassword($Password)
    {
        $this->_Password = password_hash($Password, PASSWORD_BCRYPT);

        return $this;
    }
    public function setRole($_Role)
    {
        $this->_Role = $_Role;

        return $this;
    }
    public function getRole()
    {
        return $this->_Role;
    }
}
?>