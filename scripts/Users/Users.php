<?php

abstract class Users
{
    public function __construct(protected $name)
    {
    }
    
    public function getName()
    {
        return $this->name;
    }
}

?>