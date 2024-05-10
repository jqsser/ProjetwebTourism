
<?php
include '../Controller/SpaceshipC.php';

// Vérifier si l'ID de réservation est envoyé via POST ou GET
if(isset($_POST['id_sp'])) {
    // Récupérer les détails de la réservation en fonction de l'ID
    $SpaceshipC = new SpaceshipC();
    $rec = $SpaceshipC->recupererSpaceship($_POST['id_sp']);
} elseif(isset($_GET['id_sp'])) {
    // Utiliser l'ID envoyé via GET s'il est disponible
    $SpaceshipC = new SpaceshipC();
    $rec = $SpaceshipC->recupererSpaceship($_GET['id_sp']);
} else {
    // Gérer le cas où l'ID n'est pas fourni
    header('Location: addSpaceship.php');
    exit(); // Terminer le script pour empêcher toute autre exécution
}

$error = "";
$Spaceship = null;
$SpaceshipC = new SpaceshipC();

if (

    isset($_POST['id_sp']) &&
    isset($_POST['Sp_model']) &&
    isset($_POST['NbSp_place']) &&
    isset($_POST['NbSp_voyage']) &&
    isset($_POST['description_SP'])
){
    if (
        !empty($_POST["id_sp"]) &&
        !empty($_POST["Sp_model"]) &&
        !empty($_POST["NbSp_place"]) &&
        !empty($_POST["NbSp_voyage"]) &&
        !empty($_POST["description_SP"])
    ) {
        // Créer un objet Spaceship avec les données modifiées
        $Spaceship = new Spaceship(
            $_POST['id_sp'],
            $_POST['Sp_model'],
            $_POST['NbSp_place'],
            $_POST['NbSp_voyage'],
            $_POST['description_SP'],
            $_POST['id_ELug']

        );
        // Mettre à jour la réservation dans la base de données
        $SpaceshipC->update_Spaceship($Spaceship, $_POST['id_sp']);
        // Rediriger vers la liste des réservations après la modification
        header('Location: dashSpaceship.php');
        exit(); // Terminer le script pour empêcher toute autre exécution
    } else {
        $error = "Missing information";
    }
}