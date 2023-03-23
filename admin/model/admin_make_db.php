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

function add_make($make_name)
{
    global $db;

    $query = 'INSERT INTO makes (Make) VALUES (:makeName);';

    $statement = $db->prepare($query);
    $statement->bindValue(':makeName', $make_name);
    $statement->execute();
    $statement->closeCursor(); 
}

function delete_make($make_id)
{
    global $db;
    $query = 'DELETE FROM makes WHERE ID = :make_ID';

    $statement = $db->prepare($query);
    $statement->bindValue(':make_ID', $make_id);
    $statement->execute();
    $statement->closeCursor();
}


?>