<?php

class SqlSearch extends Sql{

    public function __construct(){
        parent::__construct();
    }

    public function selectManga($name){
        
        $sql = '  select  id,titre,img from manga where titre like :name';
        $query=$this->pdo->prepare($sql);
        $query->execute(array('name'=>$name.'%'));
        $result=$query->fetchall();
        return $result;
    }
}