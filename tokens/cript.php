<?php 
    require 'config.php';

    class Cript{

        function generate($payload){
            $method = "AES-128-CTR";
            $key = Config::$tokensKey;
            $encryption_iv = '1234567891011121';

            return openssl_encrypt($payload, $method,
            $key, 0, $encryption_iv);

        }

        function read($cripted){
            $method = "AES-128-CTR";
            $key = Config::$tokensKey;
            $encryption_iv = '1234567891011121';

            return openssl_decrypt($cripted, $method,
            $key, 0, $encryption_iv);
        }

    }

?>