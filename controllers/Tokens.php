<?php 

    require 'models/tokens.php';

    function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    class Tokens{
        
        function generateToken($userId){
            $accessToken = generateRandomString();

            $result = (new TokensModel())->register($userId, $accessToken);

            if($result == 1){
                return $accessToken;
            }
            else{
                return -1;
            }

        }

        function verifyToken($accessToken){
            $result = (new TokensModel())->find($accessToken);


            if(!empty($result[0]['userId'])){
                return 1;
            }
            else{
                return 0;
            }


        }

        function verifyTokenById($userId){
            $result = (new TokensModel())->findById($userId);


            if(!empty($result[0]['userId'])){
                return 1;
            }
            else{
                return 0;
            }


        }
    }

?>