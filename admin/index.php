<?php
//FOR ADMIN
require('model/database.php');
require('model/admin_vehicle_db.php');
require('model/admin_type_db.php');
require('model/admin_class_db.php');
require('model/admin_make_db.php');



$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$year_price = filter_input(INPUT_POST, 'year_price', FILTER_VALIDATE_INT);

$type_name = filter_input(INPUT_POST, 'type_name', FILTER_UNSAFE_RAW);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_UNSAFE_RAW);
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_UNSAFE_RAW);

$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'vehicals_list';
    }
}


switch($action)
{
    //TYPES CASES
    case "list_types":
        $types = get_types();
        include('view/admin_type_list.php');
        break;

    case "add_type":
        if ($type_name) {
            add_type($type_name);
            header("Location: .?action=list_types");
            break;
        } else {
            $error = "invalid item data. Check all fields.";
            include('view/error.php');
            exit();
        }
        //add_type($type_name);
        header("Location: .?action=list_types");
        break;

    case "delete_type":
        if ($type_id) {
            try {
                delete_type($type_id);
            } catch (PDOException $error) {
                $error = "you cannot delete a category if items exist in category.";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_types");
            break;
        }
        break;

    //CLASSES CASES
    case "list_classes":
        $classes = get_classes();
        include('view/admin_class_list.php');
        break;

    case "add_class":
        if ($class_name) {
            add_class($class_name);
            header("Location: .?action=list_classes");
            break;
        } else {
            $error = "invalid item data. Check all fields.";
            include('view/error.php');
            exit();
        }
        //add_class($class_name);
        header("Location: .?action=list_classes");
        break;
    
    case "delete_class":
        if ($class_id) {
            try {
                delete_class($class_id);
            } catch (PDOException $error) {
                $error = "you cannot delete a category if items exist in category.";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_classes");
            break;
        }
        break;

    //MAKES CLASSES
    case "list_makes":
        $makes = get_makes();
        include('view/admin_make_list.php');
        break;

    case "add_make":
        if ($make_name) {
            add_make($make_name);
            header("Location: .?action=list_makes");
            break;
        } else {
            $error = "invalid item data. Check all fields.";
            include('view/error.php');
            exit();
        }
        //add_class($class_name);
        header("Location: .?action=list_makes");
        break;
        
    case "delete_make":
        if ($make_id) {
            try {
                delete_make($make_id);
            } catch (PDOException $error) {
                $error = "you cannot delete a category if items exist in category.";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_makes");
            break;
        }
        break;

    //yes I did need 2 cases
    case "add_vehicle":

        $makes = get_makes();
        $types = get_types();
        $classes = get_classes(); 

        include('view/admin_add_vehicle.php');
        break;

    case "add_vehicle2":

        //echo $year . " " . $price . " " . $model . " " . $type_id . " " . $class_id . " " . $make_id. " ";
        echo 1;

        if($year && $model && $price && $type_id && $class_id && $make_id) {
            add_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
            header("Location: .?action=list_vehicles");
            break;
        } else {
            $error = "invalid item data. Check all fields.";
            include('view/error.php');
            exit();
        }
        //add_class($class_name);
        header("Location: .?action=list_vehicles");
        break;

    case "delete_vehicle":
        if ($model) {
            try {
                delete_vehicle($model);
            } catch (PDOException $error) {
                $error = "you cannot delete a category if items exist in category.";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_vehicles");
            break;
        }
        break;

    default:
        //$categoryName = get_category_name($category_id);
        //$categories = get_categories();
        //$items = get_item_by_category($category_id);
        //include('view/item_list.php');


        //echo $type_id;
        //echo $class_id;
        //echo $make_price;
        //echo $year_price;

        //echo "This is admin.php";

        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();

        $vehicles = get_vehicle_by_categoy($type_id, $class_id, $make_id, $year_price);

        include('view/admin_vehicle_list.php');

        break;
}

?>