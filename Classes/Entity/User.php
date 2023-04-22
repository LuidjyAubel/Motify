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
                $this->$method($value);
            }
        }
    }
    /**
     * Get the value of _Id
     */
    public function getId()
    {
        return $this->_Id;
    }
    /**
     * Set the value of _Id
     * 
     * @param int $Id
     * @return self
     */
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
     * @param string $_Username
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
     * @param string $Password
     * @return  self
     */ 
    public function setPassword($Password)
    {
        $this->_Password = password_hash($Password, PASSWORD_BCRYPT);

        return $this;
    }
    /**
     * Set the value of _Role
     * 
     * @param $_Role
     * @return self
     */
    public function setRole($_Role)
    {
        $this->_Role = $_Role;

        return $this;
    }
    /**
     * Get the value of _Role
     */
    public function getRole()
    {
        return $this->_Role;
    }
}
?>