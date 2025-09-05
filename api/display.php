<?php
$user = "";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/homepageController.php";
// printWithPre($_SESSION)

$categoryController = new homepageController($conn);

if (isset($_POST["id"])) {

    $id = $_POST["id"];
    $idremove ='';
    $data = $categoryController->removeDisplayPopup($idremove);
    if($data){
        $displya = $categoryController->addDisplayPopup($id);
        if($displya){
            $response = [
                "success" => true,
                "data" => 'Popup Update Successfully'];
            echo json_encode($response);
        }
    }
   

}
if (isset($_POST["removeid"])) {

    $id = $_POST["id"];
    $data = $categoryController->removeDisplayPopup($id);
    
        if($data){
            $response = [
                "success" => true,
                "data" => 'Hide the Popup'];
            echo json_encode($response);
        }
    
   

}

?>

