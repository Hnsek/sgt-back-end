<?php 
    require 'models/tripDAO.php';
    require 'models/trip.php';

    class TripController{
        function registerTrip(){
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            $category = $_POST['category'];
            $time = $_POST['time'];
            $requestDate = $_POST['requestDate'];
            $driver = $_POST['driver'];
            $destiny = $_POST['destiny'];
            $dateBack = $_POST['dateBack'];
            $timeback = $_POST['timeback'];

            if(empty($day) || 
            empty($month) ||
            empty($year) ||
            empty($category) ||
            empty($time) ||
            empty($requestDate) ||
            empty($driver) ||
            empty($destiny) ||
            empty($dateBack) ||
            empty($timeback) 
            ){
                return false;
            }

            $document = [

                'day' => $day,
                'month' => $month,
                'year' => $year,
                'category' => $category,
                'time' => $time,
                'driver' => $driver,
                'destiny' => $year,
                'dateBack' => $dateBack,
                'timeback' => $timeback,
                'requestDate' => $requestDate,
                
                ];


            $result = (new Trip())->register($document);

            if($result->getInsertedCount() != 0){
                return true;
            }
            else{
                return false;
            }
        }
        function findTrips($year, $month){
            return (new Trip())->find($year, $month);
        }

        function findTripsByVehicles($year, $month, $vehicle){
            return (new Trip())->findByVehicles($year, $month, $vehicle);
        }
    }

?>