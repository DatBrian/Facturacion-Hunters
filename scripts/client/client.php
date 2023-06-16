<?php
class client extends connection{
    use getInstance;
    function __construct(private $Identification, public $Full_Name, public $Email, private $Address, private $Phone){
        parent::__construct();
        print_r($this->__get('Full_Name'));
    }
}
?>