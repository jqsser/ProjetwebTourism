<?php

include '../controller/AsrclientC.php';

$error = "";

// create assurance
$assurance = null;

// create an instance of the controller
$assuranceC = new AsrclientC();
if (
    isset($_POST["id_assur"]) &&
    isset($_POST["type_assur"]) &&
    isset($_POST["datedebut"]) &&
    isset($_POST["datefin"]) &&
    isset($_POST["clienthealth"])&&
    isset($_POST["asrprovider"]) &&
    isset($_POST["cost"]) &&
    isset($_POST["type"]) &&
    isset($_POST["heaid"])
    
) {
    if (
        !empty($_POST["id_assur"]) &&
        !empty($_POST['type_assur']) &&
        !empty($_POST["datedebut"]) &&
        !empty($_POST["datefin"]) &&
        !empty($_POST["clienthealth"]) &&
        !empty($_POST["asrprovider"]) &&
        !empty($_POST["cost"]) &&
        !empty($_POST["type"]) &&
        !empty($_POST["heaid"])
    ) {
        $assurance = new Asrclient(
            $_POST['id_assur'],
            $_POST['type_assur'],
            new DateTime($_POST['datedebut']),
            new DateTime($_POST['datefin']),
            $_POST['clienthealth'],
            $_POST['asrprovider'],
            $_POST['cost'],
            $_POST['type'],
            $_POST['heaid']
            
        );
        $assuranceC->updateassurance($assurance, $_POST["id_assur"]);
        header('Location:readassur.php');
    } else
        $error = "Missing information";
}
?>

