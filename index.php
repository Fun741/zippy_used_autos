<?php
//FOR USERES
require('view/main.css');
require('model/database.php');
require('model/vehicle_db.php');
require('model/type_db.php');
require('model/class_db.php');
require('model/make_db.php');


$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$year_price = filter_input(INPUT_POST, 'year_price', FILTER_VALIDATE_INT);


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'item_list';
    }
}


switch($action)
{
    default:
        //$categoryName = get_category_name($category_id);
        //$categories = get_categories();
        //$items = get_item_by_category($category_id);
        //include('view/item_list.php');


        //echo $type_id;
        //echo $class_id;
        //echo $make_price;
        //echo $year_price;

        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();

        $vehicles = get_vehicle_by_categoy($type_id, $class_id, $make_id, $year_price);

        include('view/vehicle_list.php');

        break;
}


?>
