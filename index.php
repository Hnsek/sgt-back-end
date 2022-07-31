<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type, Authorization');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require 'controllers/tripController.php';
    require 'tokens/cript.php';
    require 'controllers/user.php';

    if($_GET['route']){
        $route = $_GET['route'];

        if($route != 'findTrips' &&  $route != 'signin'){
            $headers = apache_request_headers();

            if ($headers['token']){

                $result = (new Tokens())->verifyToken(trim($headers['token']));

                if($result == 0){
                    echo json_encode([
                        'resposta' => -2
                    ]);
                    $route = null;    
                }
            }
            else{
                $route = null;
                echo json_encode([
                    'resposta' => -2
                ]);
            }
            
        }
        switch ($route) {
            case 'registerTrip':
                try{
                    echo (new TripController())->registerTrip();
                }
                catch(Exception $erro){
                    echo "erro";
                }
                break;
            case 'findTrips':
                try{
                    $month = $_REQUEST['month'];
                    $year = $_REQUEST['year'];

                    $documents =  (new TripController())->findTrips($year, $month);
                    echo json_encode($documents);
                }
                catch(Exception $erro){
                    echo $erro;
                }
                break;
            case 'findReport':
                try{
                    $month = $_REQUEST['month'];
                    $year = $_REQUEST['year'];
                    $vehicle = $_REQUEST['vehicle'];

                    $documents =  (new TripController())->findTripsByVehicles($year, $month, $vehicle);
                    echo json_encode($documents);
                }
                catch(Exception $erro){
                    echo $erro;
                }
                break;
            case 'signin':

                $user = $_POST['user'];
                $password = $_POST['password'];
                

                echo (new User())->signin($user,$password);
                break;
            case 'signup':

                $user = $_POST['user'];
                $password = $_POST['password'];

                echo (new User())->signup($user,$password);
                break;
            }
    }

?>