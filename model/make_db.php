<?php

function get_makes()
{
    global $db;

    $query = 'SELECT ID, make FROM makes';

    $statement = $db->prepare($query);

    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes; 
}




?>