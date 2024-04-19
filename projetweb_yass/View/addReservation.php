<?php
    include_once '../Controller/ReservationC.php';
    include_once '../Model/Reservation.php';


    

    $error = "";
    
    $Reservation = null;
    
    $ReservationC = new ReservationC();
    if (
        
        
        isset($_POST['departure']) &&
        isset($_POST['flightdate']) &&
        isset($_POST['returndate']) &&
        isset($_POST['nb_passengers'])
    ){
        if (
            
           
            !empty($_POST["departure"]) &&
            !empty($_POST["flightdate"]) &&
            !empty($_POST["returndate"]) &&
            !empty($_POST["nb_passengers"]) 
        ) {
            $Reservation = new Reservation(
                
                NULL,
                $_POST['departure'] ,
                $_POST['flightdate'] ,
                $_POST['returndate'] ,

               $_POST['nb_passengers'] 
            );
			$ReservationC->add_reservation($Reservation);
           
        }
        else
            $error = "Missing information";
   }

   if(isset($_POST['ajouter']))
	{
    	header ('Location:ListeReservations.php');
	}

?>



<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title> Reserve Your Spot</title>
    <script>
        function validateForm() {
    var id_reserv = document.getElementById("id_reserv").value;
    var departure = document.getElementById("departure").value;
    var flightdate = document.getElementById("flightdate").value;
    var returndate = document.getElementById("returndate").value;
    var nb_passengers = document.getElementById("nb_passengers").value;

    // Check if any field is empty
    if (id_reserv == "" || departure == "" || flightdate == "" || returndate == "" || nb_passengers == "") {
        alert("All fields are required");
        return false;
    }

    // Check if return date is after flight date
    if (returndate <= flightdate) {
        alert("Return date must be after the flight date");
        return false;
    }

    // Check if number of passengers is numeric
    if (isNaN(nb_passengers)) {
        alert("Number of passengers must be numeric");
        return false;
    }

    if (isNaN(id_reserv)) {
    alert("Reservation ID must be an integer");
    return false;
}

// Check if departure is a string
if (!isNaN(departure)) {
    alert("Departure must be a string");
    return false;
}
    }


    </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve </title>
    <!-- Lien vers la feuille de style Bulma -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <!-- Feuille de style personnalisée -->
    <style>
        body {
            background-color: #2c3e50; /* Couleur de fond bleue */
            padding: 20px;
        }
        .form-container {
            background-color: #fff; /* Fond blanc */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Ombre légère */
        }
        .form-container h1 {
            color: #2c3e50; /* Couleur bleue */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="form-container">
                    <h1 class="title has-text-centered">Reserve Your Spot!</h1>
                    <form method="POST" onsubmit="return validateForm();">
    
    <div class="form-group">
        <input type="text" class="form-control p-2" name="departure" id="departure" placeholder="Departure">
    </div>
    <div class="form-group">
        <input type="date" class="form-control p-2" name="flightdate" id="flightdate" placeholder="Flight date">
    </div>
    <div class="form-group">
        <input type="date" class="form-control p-2" name="returndate" id="returndate" placeholder="Return date">
    </div>
    <div class="form-group">
        <input type="number" class="form-control p-2" name="nb_passengers" id="nb_passengers" placeholder="Number of passagers">
    </div>
    <div class="form-group">
        <input class="btn btn-success" type="submit" name="ajouter" value="Book now" style="background-color: #2c3e50; border-color: #2c3e50;">
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>