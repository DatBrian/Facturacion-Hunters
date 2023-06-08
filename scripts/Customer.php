<?php

class Customer extends Users
{
    use Singleton;

    public function __construct(
        protected $name,
        protected $identification,
        protected $email,
        protected $address,
        protected $phone
    ) {
        parent::__construct($name);
    }

    public function getId()
    {
        return $this->identification;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}

?>