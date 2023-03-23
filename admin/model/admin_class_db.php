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

function add_class($class_name)
{
    global $db;

    $query = 'INSERT INTO classes (Class) VALUES (:className);';

    $statement = $db->prepare($query);
    $statement->bindValue(':className', $class_name);
    $statement->execute();
    $statement->closeCursor(); 
}

function delete_class($class_id)
{
    global $db;
    $query = 'DELETE FROM classes WHERE ID = :class_ID';

    $statement = $db->prepare($query);
    $statement->bindValue(':class_ID', $class_id);
    $statement->execute();
    $statement->closeCursor();
}



?>