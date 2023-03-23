<?php

function get_vehicle_by_categoy($type_id, $class_id, $make_id, $year_price)
{
    global $db;

if($year_price == NULL)
{
    $year_price = 1;
}

if($year_price == 1)
{
    if($type_id)
    {
        $query = 'SELECT v.year, v.model, v.price, t.type, m.make, c.class
                    FROM vehicles AS v
                    JOIN types AS t ON v.type_id = t.ID
                    JOIN makes AS m ON v.make_id = m.ID
                    JOIN classes AS c ON v.class_id = c.ID
                    WHERE v.type_id = :typeID
                    ORDER BY v.price DESC;';
    }
    else if($class_id)
    {
        $query = 'SELECT v.year, v.model, v.price, t.type, m.make, c.class
                    FROM vehicles AS v
                    JOIN types AS t ON v.type_id = t.ID
                    JOIN makes AS m ON v.make_id = m.ID
                    JOIN classes AS c ON v.class_id = c.ID
                    WHERE v.class_id = :classID
                    ORDER BY v.price DESC;';
    }
    else if($make_id)
    {
        $query = 'SELECT v.year, v.model, v.price, t.type, m.make, c.class
                    FROM vehicles AS v
                    JOIN types AS t ON v.type_id = t.ID
                    JOIN makes AS m ON v.make_id = m.ID
                    JOIN classes AS c ON v.class_id = c.ID
                    WHERE v.make_id = :makeID
                    ORDER BY v.price DESC;';
    }
    else 
    {
        $query = 'SELECT v.year, v.model, v.price, t.type, m.make, c.class
                    FROM vehicles AS v
                    JOIN types AS t ON v.type_id = t.ID
                    JOIN makes AS m ON v.make_id = m.ID
                    JOIN classes AS c ON v.class_id = c.ID
                    ORDER BY v.price DESC;';
    }
}
else if($year_price == 2)
{
    if($type_id)
    {
        $query = 'SELECT v.year, v.model, v.price, t.type, m.make, c.class
                    FROM vehicles AS v
                    JOIN types AS t ON v.type_id = t.ID
                    JOIN makes AS m ON v.make_id = m.ID
                    JOIN classes AS c ON v.class_id = c.ID
                    WHERE v.type_id = :typeID
                    ORDER BY v.year DESC;';
    }
    else if($class_id)
    {
        $query = 'SELECT v.year, v.model, v.price, t.type, m.make, c.class
                    FROM vehicles AS v
                    JOIN types AS t ON v.type_id = t.ID
                    JOIN makes AS m ON v.make_id = m.ID
                    JOIN classes AS c ON v.class_id = c.ID
                    WHERE v.class_id = :classID
                    ORDER BY v.year DESC;';
    }
    else if($make_id)
    {
        $query = 'SELECT v.year, v.model, v.price, t.type, m.make, c.class
                    FROM vehicles AS v
                    JOIN types AS t ON v.type_id = t.ID
                    JOIN makes AS m ON v.make_id = m.ID
                    JOIN classes AS c ON v.class_id = c.ID
                    WHERE v.make_id = :makeID
                    ORDER BY v.year DESC;';
    }
    else 
    {
        $query = 'SELECT v.year, v.model, v.price, t.type, m.make, c.class
                    FROM vehicles AS v
                    JOIN types AS t ON v.type_id = t.ID
                    JOIN makes AS m ON v.make_id = m.ID
                    JOIN classes AS c ON v.class_id = c.ID
                    ORDER BY v.year DESC;';
    }
}


    $statement = $db->prepare($query);
    if ($type_id) {
        $statement->bindValue(':typeID', $type_id);
    }
    else if ($class_id) {
        $statement->bindValue(':classID', $class_id);
    }
    else if ($make_id) {
        $statement->bindValue(':makeID', $make_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles; 
}

function add_vehicle($year, $model, $price, $type_id, $class_id, $make_id)
{
    global $db;

    $query = 'INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) 
                VALUES (:year, :model, :price, :typeID, :classID, :makeID);';

    $statement = $db->prepare($query); 
    
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':typeID', $type_id);
    $statement->bindValue(':classID', $class_id);
    $statement->bindValue(':makeID', $make_id);

    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($model)
{
    global $db;
    $query = 'DELETE FROM vehicles WHERE model = :model';

    $statement = $db->prepare($query);
    $statement->bindValue(':model', $model);
    $statement->execute();
    $statement->closeCursor();
}






?>