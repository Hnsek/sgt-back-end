<?php

class Database{
    private $user = "hnsek"; 
    private $password = "WQhcEEwHf5BgfKfD";
    // private $databaseURL = "mongodb+srv://".$this->user.":".$this->password."@database.yzbv0dj.mongodb.net/?retryWrites=true&w=majority";

    // public static $connection = new MongoDB\Driver\Manager($databaseURL);
    function getConnection(){
        $connection = new MongoDB\Driver\Manager("mongodb+srv://".$this->user.":".$this->password."@database.yzbv0dj.mongodb.net/?retryWrites=true&w=majority");
        return $connection;
    }

}

?>