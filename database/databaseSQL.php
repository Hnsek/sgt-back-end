<?php 

    class DatabaseSQL{
        private $host = 'localhost';
        private $dbName='sgt';
        private $user='root';
        private $password = 'hnsekserver123';

        function getConnection(){
            return new PDO("mysql:host=".$this->host.";dbname=".$this->dbName, $this->user, $this->password);
        }
    }

?>