<?php 

class Connection {

    public static function getPDO():PDO
    {
         return new PDO(DBDSN,DBUSERNAME,DBPASSWORD,[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ]);
    }

}