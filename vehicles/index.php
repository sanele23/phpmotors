<?php
require_once '../library/connections.php'; // database connection file
require_once '../library/functions.php'; // function connection file
require_once '../model/main-model.php'; // model file for main
require_once '../model/vehicles-model.php'; // model file for vehicles

//Create or access a Session
session_start();

$classifications = getClassifications();
// build a navigation bar
$navList = buildNav($classifications);


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'add-classification':
        $pageTitle = 'Add Classification';
        include '../view/add-classification.php';
        break;

    case 'addClassification':
        $pageTitle = 'Add Classification';
        $classification = trim(filter_input(INPUT_POST, 'classification', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        if(empty($classification)) {
            $_SESSION['message'] = '<p class="notice">Please provide information for this empty form field.</p>';
            include '../view/add-classification.php';
            exit;
            break;
        }

        $regOutcome = addClassification($classification);
        if($regOutcome === 1){
            $_SESSION['message'] = "<p class='success'>Classification saved succesfully.</p>";
        } else {
            $_SESSION['message'] = "<p class='notice'>Error while saving the classification.</p>";
        }
        include '../view/add-classification.php';
        exit;
        break;

    case 'add-vehicle':
        $pageTitle = 'Add Vehicle';
        include '../view/add-vehicle.php';
        break;

    // Add vehicle to database validation
    case 'addVehicleToDatabase':
        $pageTitle = 'Add Vehicle';
        
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
        $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING));
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_URL));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_URL));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));
        
        // Check for missing data
        if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
            $message = '<p class="center">Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit;
        }

        // Send data to the model if no errors exist
        $regOutcome = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        if($regOutcome === 1){
            $_SESSION['message'] = "<p class='success'>Vehicle saved succesfully.</p>";
        } else {
            $_SESSION['message'] = "<p class='notice'>Error while saving the Vehicle.</p>";
        }        
        include '../view/add-vehicle.php';
        exit;
        break;

    case 'getInventoryItems': 
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId); 
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray); 
        break;

    case 'updateVehicle':
        // Filter and store the data
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_URL);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_URL);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        
        if (empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) {
            $_SESSION['message'] = '<p class="notice">Please provide information for all empty form fields.</p>';
            include '../view/vehicle-update.php';
            exit;
        }
        $updateResult = updateVehicle(
            $invMake, 
            $invModel, 
            $invDescription, 
            $invImage, 
            $invThumbnail, 
            $invPrice, 
            $invStock, 
            $invColor, 
            $classificationId, 
            $invId
        );

        if ($updateResult) {
            $_SESSION['message'] = "<p class='success'>Congratulations the $Make $Model was successfully updated.</p>";
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $_SESSION['message'] = "<p class='notice'>Error. The new vehicle was not Edited.</p>";
            $carClassifications = $classifications;
            include '../view/vehicle-update.php';
            exit;
        }
        break;

    case 'mod':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invInfo = getInvItemInfo($invId);
        if(count($invInfo)<1){
            $_SESSION['message'] = 'Sorry, no vehicle information could be found.';
        }
        $carClassifications = $classifications;
        include '../view/vehicle-update.php';
        exit;
        break;

    case 'del':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $_SESSION['message'] = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-delete.php';
        exit;
        break;

    case 'deleteVehicle':
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $deleteResult = deleteVehicle($invId);
        if ($deleteResult) {
            $_SESSION['message'] = "<p class='success'>Congratulations the $invMake $invModel was successfully deleted.</p>";
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $_SESSION['message'] = "<p class='notice'>Error: $invMake $invModel was not deleted.</p>";
            header('location: /phpmotors/vehicles/');
            exit;
        }
        break;
    
    case 'classification':
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $vehicles = getVehiclesByClassification($classificationName);
        if(!count($vehicles)){
            $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
        } else {
            $vehicleDisplay = buildVehiclesDisplay($vehicles);
        }
        include '../view/classification.php';
        break;
        

    case 'details':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        $reviewsInfo = getReviewsByInventory($invId);
        if (!isset($invInfo)) {
            $message = "<p class='warning-message'>Sorry, no vehicle could be found.</p>";
        } else {
            $vehicleDetail = buildVehicleDisplay($invInfo);
            $reviewsDisplay = buildReviewsDisplay($reviewsInfo, $invId);
            $_SESSION['reviews'] = $reviewsDisplay;
        }
        include '../view/vehicle-detail.php';
        break;

    default:
        $classificationList = buildClassificationList($classifications);
        include '../view/vehicle-management.php';
        break;
}
?>