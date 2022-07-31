<?php 

    require 'database/databaseSQL.php';

    class Users{

        function register($user, $password){
            $connection = (new DatabaseSQL())->getConnection();

            $stmt = $connection->prepare("INSERT INTO users(user, password) VALUES(?, ?)");
            $stmt->bindParam(1,$user);
            $stmt->bindParam(2,$password);
            return $stmt->execute();
        }

        function findByUser($user){

            $connection = (new DatabaseSQL())->getConnection();

            $stmt = $connection->prepare("SELECT user FROM users WHERE user = ?");
            $stmt->bindParam(1,$user);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        function find($user){
            $connection = (new DatabaseSQL())->getConnection();

            $stmt = $connection->prepare("SELECT id,user, password FROM users WHERE user = ?");
            $stmt->bindParam(1,$user);
            $stmt->execute();
            return $stmt->fetchAll();
        }

    }

?>