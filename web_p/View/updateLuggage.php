
<?php
include '../Controller/LuggageC.php';

// Vérifier si l'ID de réservation est envoyé via POST ou GET
if(isset($_POST['id_luggage'])) {
    // Récupérer les détails de la réservation en fonction de l'ID
    $LuggageC = new LuggageC();
    $rec = $LuggageC->recupererLuggage($_POST['id_luggage']);
    
} else {
    // Gérer le cas où l'ID n'est pas fourni
    header('Location: dashLuggage.php');
    exit(); // Terminer le script pour empêcher toute autre exécution
}

$error = "";
$Luggage = null;
$LuggageC = new LuggageC();

if (

    isset($_POST['id_luggage']) &&
    isset($_POST['type_Lu']) &&
    isset($_POST['weight_Lu']) 
){
    if (
        !empty($_POST["id_luggage"]) &&
        !empty($_POST["type_Lu"]) &&
        !empty($_POST["weight_Lu"]) 
    ) {
        // Créer un objet Luggage avec les données modifiées
        $Luggage = new Luggage(
            $_POST['id_luggage'],
            $_POST['type_Lu'],
            $_POST['weight_Lu']
        );
        // Mettre à jour la réservation dans la base de données
        header('Location: dashLuggage.php');
        exit(); // Terminer le script pour empêcher toute autre exécution
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Modifier Luggage</title>
    <script>
        function validateForm() {
    var id_luggage = document.getElementById("id_luggage").value;
    var type_Lu = document.getElementById("type_Lu").value;
    var weight_Lu = document.getElementById("weight_Lu").value;

    // Check if any field is empty
    if (type_Lu == "" || weight_Lu == "" ) {
        alert("All fields are required");
        return false;
    }



    if (isNaN(weight_Lu)) 
    {
        alert("Number of place must be numeric");
        return false;
    }
    // Check if type_Lu is a string
    if (!isNaN(type_Lu)) 
    {
            alert("type_Lu must be a string");
            return false;
    }
    }


    </script>
</head>

    <body>

    <h1>Modifier Luggage</h1>
    <br>
    <form method="POST" onsubmit="return validateForm();">
                        
                                
        <br>
            <div class="form-group>
                <input type="hidden" value="<?php echo $rec['id_luggage']?>" name="id_luggage" id="id_luggage">
                <input type="text" class="form-control p-2" value="<?php echo $rec['id_luggage']?>" name="id_luggage_display" id="id_luggage_display" placeholder="id_luggage" disabled>
            </div>
        </br>
        
            <br>
            <div class="form-group>
                <input type="text" class="form-control p-2" value="<?php echo $rec['type_Lu']?>" name="type_Lu" id="type_Lu" placeholder="type_Lu">
            </div>
            </br>
            <br>
            <div class="form-group>
                <input type="int" class="form-control p-2" value="<?php echo $rec['weight_Lu']?>" name="weight_Lu" id="weight_Lu" placeholder="weight_Lu">
            </div>
            </br>
        <div class="form-group>
            <input class="btn btn-success" type="submit" name="modifier" value="Modifier">
        </div>
        </br>
            
    </form>
                        
        

    </body>

</html>




