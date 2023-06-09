<?php

class Seller extends Users
{
    use Singleton;

    public function __construct(
        protected $name
    ){
        parent::__construct($name);
    }
}

?>