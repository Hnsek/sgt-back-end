<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require 'controllers/tripController.php';

    if($_GET['route']){
        $route = $_GET['route'];
        
        switch ($route) {
            case 'registerTrip':
                try{
                    echo (new TripController())->registerTrip();
                }
                catch(Exception $erro){
                    echo $erro;
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
            }
    }

?>