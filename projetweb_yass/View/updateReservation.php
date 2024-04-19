<?php
include '../Controller/ReservationC.php';

// Vérifier si l'ID de réservation est envoyé via POST ou GET
if(isset($_POST['id_reserv'])) {
    // Récupérer les détails de la réservation en fonction de l'ID
    $ReservationC = new ReservationC();
    $rec = $ReservationC->recupererReservation($_POST['id_reserv']);
} elseif(isset($_GET['id_reserv'])) {
    // Utiliser l'ID envoyé via GET s'il est disponible
    $ReservationC = new ReservationC();
    $rec = $ReservationC->recupererReservation($_GET['id_reserv']);
} else {
    // Gérer le cas où l'ID n'est pas fourni
    header('Location: addReservation.php');
    exit(); // Terminer le script pour empêcher toute autre exécution
}

$error = "";
$Reservation = null;
$ReservationC = new ReservationC();

if (
    isset($_POST['id_reserv']) &&
    isset($_POST['departure']) &&
    isset($_POST['flightdate']) &&
    isset($_POST['returndate']) &&
    isset($_POST['nb_passengers'])
){
    if (
        !empty($_POST["id_reserv"]) &&
        !empty($_POST["departure"]) &&
        !empty($_POST["flightdate"]) &&
        !empty($_POST["returndate"]) &&
        !empty($_POST["nb_passengers"])
    ) {
        // Créer un objet Reservation avec les données modifiées
        $Reservation = new Reservation(
            $_POST['id_reserv'],
            $_POST['departure'],
            $_POST['flightdate'],
            $_POST['returndate'],
            $_POST['nb_passengers']
        );
        // Mettre à jour la réservation dans la base de données
        $ReservationC->update_reservation($Reservation, $_POST['id_reserv']);
        // Rediriger vers la liste des réservations après la modification
        header('Location: ListeReservations.php');
        exit(); // Terminer le script pour empêcher toute autre exécution
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier reservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Ajoutez vos styles CSS personnalisés ici */
        /* Ajustements visuels */
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #2c3e50; /* Nouvelle couleur */
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #1c2833; /* Nuance plus foncée au survol */
        }

        /* Styles de police */
        h1 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        /* Mise en page */
        .form-row {
            display: flex;
            flex-direction: column;
        }

        .btn-submit {
            margin-top: 15px;
        }
    </style>
    <script>
        function validateForm() {
            var id_reserv = document.getElementById("id_reserv").value;
            var departure = document.getElementById("departure").value;
            var flightdate = document.getElementById("flightdate").value;
            var returndate = document.getElementById("returndate").value;
            var nb_passengers = document.getElementById("nb_passengers").value;

            if (id_reserv == "" || departure == "" || flightdate == "" || returndate == "" || nb_passengers == "") {
                alert("All fields are required");
                return false;
            }

            if (returndate <= flightdate) {
                alert("Return date must be after the flight date");
                return false;
            }

            if (isNaN(nb_passengers)) {
                alert("Number of passengers must be numeric");
                return false;
            }

            if (isNaN(id_reserv)) {
                alert("Reservation ID must be an integer");
                return false;
            }

            if (!isNaN(departure)) {
                alert("Departure must be a string");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<div class="container">
    <h1>Modifier Reservation</h1>
    <form method="POST" onsubmit="return validateForm();">
        <div class="form-group">
            <input type="hidden" value="<?php echo $rec['id_reserv']?>" name="id_reserv" id="id_reserv">
            <input type="text" class="form-control" value="<?php echo $rec['id_reserv']?>" name="id_reserv_display" id="id_reserv_display" placeholder="ID Reservation" disabled>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="<?php echo $rec['departure']?>" name="departure" id="departure" placeholder="Departure">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" value="<?php echo $rec['flightdate']?>" name="flightdate" id="flightdate" placeholder="Flight Date">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" value="<?php echo $rec['returndate']?>" name="returndate" id="returndate" placeholder="Return Date">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" value="<?php echo $rec['nb_passengers']?>" name="nb_passengers" id="nb_passengers" placeholder="Number of Passengers">
        </div>
        <button class="btn btn-success btn-submit" type="submit" name="modifier">Modifier</button>
    </form>
</div>

</body>
</html>
