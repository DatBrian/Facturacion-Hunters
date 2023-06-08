<?php

abstract class Users
{
    private function __construct(protected $name)
    {
    }
    public function getName()
    {
        return $this->name;
    }
}

?>