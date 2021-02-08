<?php 

class SqlLogin extends Sql{
    protected $class=User::class;
    public function __construct(){
        parent::__construct();
    }

    public function sqlUserConnection($login,$mdp){
        $sql="SELECT nom,prenom,email,date_inscription,name_role 
            FROM userDB AS u, role_user AS r 
            WHERE u.id_role_user=r.id AND email LIKE :email AND mdp LIKE :mdp";
         $query=$this->pdo->prepare($sql);
         $query->execute(array('email'=>$login,'mdp'=>$mdp));
         $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
         $result=$query->fetch();
         return $result;
    }

    public function sqlCheckEmail($email){
        $sql="SELECT *
        FROM userDB AS u, role_user AS r 
        WHERE u.id_role_user=r.id AND email LIKE :email";
         $query=$this->pdo->prepare($sql);
         $query->execute(['email'=>$email]);
         $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
         $result=$query->fetch();
         return $result;
    }

    public function sqlInsertUser($nom,$prenom,$mdp,$email,$date_inscription,$id_role_user){
        $sql="insert into userDB(nom,prenom,mdp,email,date_inscription,id_role_user)
            values(:nom,:prenom,:mdp,:email,:date_inscription,:id_role_user)";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('nom'=>$nom,'prenom'=>$prenom,'mdp'=>$mdp,'email'=>$email,'date_inscription'=>$date_inscription,'id_role_user'=>$id_role_user));

        
    }
}