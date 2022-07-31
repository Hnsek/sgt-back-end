<?php 


    class TokensModel{

        function register($userID, $accessToken){
            $connection = (new DatabaseSQL())->getConnection();

            $stmt = $connection->prepare("INSERT INTO accessToken (userId, accessToken) VALUES(?, ?)");
            $stmt->bindParam(1,$userID);
            $stmt->bindParam(2,$accessToken);
            return $stmt->execute();
        }

        // function findByUser($user){

        //     $connection = (new DatabaseSQL())->getConnection();

        //     $stmt = $connection->prepare("SELECT user FROM users WHERE user = ?");
        //     $stmt->bindParam(1,$user);
        //     $stmt->execute();
        //     return $stmt->fetchAll();
        // }

        function find($accessToken){
            $connection = (new DatabaseSQL())->getConnection();

            $stmt = $connection->prepare("SELECT userId FROM accessToken WHERE accessToken = ?");
            $stmt->bindParam(1,$accessToken);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        function findById($userId){
            $connection = (new DatabaseSQL())->getConnection();

            $stmt = $connection->prepare("SELECT userId FROM accessToken WHERE userId = ?");
            $stmt->bindParam(1,$userId);
            $stmt->execute();
            return $stmt->fetchAll();
        }

    }

?>