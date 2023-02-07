<?php
include "model/database.php";
$records = $db->query("SELECT title FROM regions ");
if($records->num_rows > 0)
        {
            while($record = $records->fetch_assoc())
            {
                $result[] = $record; 
            }
            echo json_encode($result,true);
        }