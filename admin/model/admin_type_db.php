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

function add_type($type_name)
{
    global $db;

    $query = 'INSERT INTO types (Type) VALUES (:typeName);';

    $statement = $db->prepare($query);
    $statement->bindValue(':typeName', $type_name);
    $statement->execute();
    $statement->closeCursor(); 
}

function delete_type($type_id)
{
    global $db;
    $query = 'DELETE FROM types WHERE ID = :type_ID';

    $statement = $db->prepare($query);
    $statement->bindValue(':type_ID', $type_id);
    $statement->execute();
    $statement->closeCursor();
}



?>