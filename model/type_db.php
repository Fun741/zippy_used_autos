<?php

function get_types()
{
    global $db;

    $query = 'SELECT ID, type FROM types';

    $statement = $db->prepare($query);

    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types; 
}






?>