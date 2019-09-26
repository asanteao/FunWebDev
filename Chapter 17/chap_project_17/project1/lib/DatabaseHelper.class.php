<?php

class DatabaseHelper {
 
	// 3 element array consisting of [0]=>connstr, [1]=>user, [2]=>password
    public static function createConnectionInfo($values=array()) {
          $connString = $values[0];
          $user = $values[1]; 
          $password = $values[2];

          $pdo = new PDO($connString,$user,$password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $pdo;      
    }


    public static function runQuery($pdo, $sql, $parameters=array())     {
        // Ensure parameters are in an array
        if (!is_array($parameters)) {
            $parameters = array($parameters);
        }

        $statement = null;
        if (count($parameters) > 0) {
            // Use a prepared statement if parameters 
            $statement = $pdo->prepare($sql);
            $executedOk = $statement->execute($parameters);
            if (! $executedOk) {
                throw new PDOException;
            }
        } else {
            // Execute a normal query     
            $statement = $pdo->query($sql); 
            if (!$statement) {
                throw new PDOException;
            }
        }
        return $statement;
    }    
    
}




?>
