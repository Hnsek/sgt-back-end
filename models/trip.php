<?php 

    require 'database/database.php';

    class Trip{
        function register($document){
            $bulk = new MongoDB\Driver\BulkWrite;

            $bulk->insert($document);

            $connection = (new Database())->getConnection();
            return $connection->executeBulkWrite('database.calendar', $bulk);
            
        }

        function find($year, $month){
            
            $filter = ['month' => $month, 'year' => $year];
            $options = [];

            $query = new MongoDB\Driver\Query($filter, $options);

            $connection = (new Database())->getConnection();

            $cursor = $connection->executeQuery('database.calendar', $query);
            $cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
            return $cursor->toArray();

            
        }

        function findByVehicles($year, $month, $vehicle){
            
            $filter = ['month' => $month, 'year' => $year,'category' => $vehicle ];
            $options = [];

            $query = new MongoDB\Driver\Query($filter, $options);

            $connection = (new Database())->getConnection();

            $cursor = $connection->executeQuery('database.calendar', $query);
            $cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
            return $cursor->toArray();

            
        }
    }

?>