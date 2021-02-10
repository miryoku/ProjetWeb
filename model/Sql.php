<?php

abstract class Sql{

    protected $pdo;

    public function __construct(){

        $this->pdo = Connection::getPDO();
       
    }




}