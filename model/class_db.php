<?php

function get_classes()
{
    global $db;

    $query = 'SELECT ID, class FROM classes';

    $statement = $db->prepare($query);

    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes; 
}




?>