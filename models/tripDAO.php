<?php 

    class TripDAO{
        private $day;
        private $month;
        private $year;
        private $time;
        private $requestDate;
        private $driver;
        private $destiny;
        private $dateBack;
        private $timeback;

        function __construct($day,$month,$year,$time,$requestDate,$driver,$destiny,$dateBack,$timeback){
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
            $this->time = $time;
            $this->requestDate = $requestDate;
            $this->driver = $driver;
            $this->destiny = $destiny;
            $this->dateBack = $dateBack;
            $this->timeback = $timeback;
        }

        function getDay(){
            return $this->day;
        }

        function getMonth(){
            return $this->month;
        }

        function getYear(){
            return $this->year;
        }

        function getTime(){
            return $this->time;
        }

        function getRequestDate(){
            return $this->requestDate;
        }

        function getDriver(){
            return $this->driver;
        }

        function getDateBack(){
            return $this->dateBack;
        }

        function getDestiny(){
            return $this->destiny;
        }


        function getTimeback(){
            return $this->timeback;
        }


    }

?>