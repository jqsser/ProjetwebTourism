
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
            $_POST['description_SP']
        );
        // Mettre à jour la réservation dans la base de données
        $SpaceshipC->update_Spaceship($Spaceship, $_POST['id_sp']);
        // Rediriger vers la liste des réservations après la modification
        header('Location: ListeSpaceship.php');
        exit(); // Terminer le script pour empêcher toute autre exécution
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Modifier Spaceship</title>
    <script>
        function validateForm() {
    var id_sp = document.getElementById("id_sp").value;
    var Sp_model = document.getElementById("Sp_model").value;
    var NbSp_place = document.getElementById("NbSp_place").value;
    var NbSp_voyage = document.getElementById("NbSp_voyage").value;
    var description_SP = document.getElementById("description_SP").value;

    // Check if any field is empty
    if (id_sp == "" || Sp_model == "" || NbSp_place == "" || NbSp_voyage == "" || description_SP == "") {
        alert("All fields are required");
        return false;
    }

    if (!isNaN(description_SP)) 
    {
        alert("description_SP must be a string");
        return false;
    }

    if (isNaN(NbSp_place)) 
    {
        alert("Number of place must be numeric");
        return false;
    }
    if (isNaN(NbSp_voyage)) 
    {
        alert("Number of voyage must be numeric");
        return false;
    }

    // Check if Sp_model is a string
    if (!isNaN(Sp_model)) 
    {
            alert("Sp_model must be a string");
            return false;
    }
    }


    </script>
</head>

    <body>

    <h1>Modifier Spaceship</h1>
    <br>
    <form method="POST" onsubmit="return validateForm();">
                        
                                
        <br>
            <div >
                <input type="hidden" value="<?php echo $rec['id_sp']?>" name="id_sp" id="id_sp">
                <input type="text" class="form-control p-2" value="<?php echo $rec['id_sp']?>" name="id_sp_display" id="id_sp_display" placeholder="id_sp" disabled>
            </div>
        </br>
        
            <br>
            <div >
                <input type="text" class="form-control p-2" value="<?php echo $rec['Sp_model']?>" name="Sp_model" id="Sp_model" placeholder="Sp_model">
            </div>
            </br>
            <br>
            <div >
                <input type="int" class="form-control p-2" value="<?php echo $rec['NbSp_place']?>" name="NbSp_place" id="NbSp_place" placeholder="NbSp_place">
            </div>
            </br>
            <br>
            <div >
                <input type="int" class="form-control p-2" value="<?php echo $rec['NbSp_voyage']?>" name="NbSp_voyage" id="NbSp_voyage" placeholder="NbSp_voyage">
            </div>
            </br>
            <br>
            <div >
                <input type="text" class="form-control p-2" value="<?php echo $rec['description_SP']?>" name="description_SP" id="description_SP" placeholder="description_SP">
            </div>
            </br>
                <br>
        <div >
            <input class="btn btn-success" type="submit" name="Update" value="Update">
        </div>
        </br>
            
    </form>
                        
        

    </body>

</html>




