<?php 

    require 'models/users.php';
    require 'controllers/Tokens.php';

    class User{
        function signin($user, $password){
            if(empty($user) || empty($password)){
                echo json_encode([
                    'resposta' => 0
                ]);
            }
            else{
                $usersFinded = (new Users())->find($user);



                if((new Tokens())->verifyTokenById($usersFinded[0]['id']) == 1){
                    return json_encode([
                        'resposta' => -3
                    ]);
                }
                else{
                    

                    $passwordDecrypted = (new Cript())->read($usersFinded[0]['password']);

                    if($user == $usersFinded[0]['user'] && $password == $passwordDecrypted){
                        return json_encode([
                            'resposta' => (new Tokens())->generateToken($usersFinded[0]['id'])
                        ]);
                    }
                    else{
                        return json_encode([
                            'resposta' => -1
                        ]);
                    }
                }
            }


            

            


        }
        function signup($user, $password){

            if(empty($user) || empty($password)){
                return false;
            }

            $usersFinded = (new Users())->findByUser($user);
            
            if($usersFinded[0]['user'] == $user){
                return -1;
            }
        
            

            


            $criptedPassword = (new Cript())->generate($password);

            return (new Users())->register($user, $criptedPassword);
        }
    }

?>