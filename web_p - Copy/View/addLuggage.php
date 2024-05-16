<?php
include '../Controller/SpaceshipC.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SpaceshipC = new SpaceshipC();

    // Check if all required fields are provided
    if (!empty($_POST["Sp_model"]) && !empty($_POST["NbSp_place"]) && !empty($_POST["NbSp_voyage"]) && !empty($_POST["description_SP"])) {
        // Create a new Spaceship object with the modified data
        $Spaceship = new Spaceship(
            $_POST['id_sp'], // Retrieved from the form
            $_POST['Sp_model'],
            $_POST['NbSp_place'],
            $_POST['NbSp_voyage'],
            $_POST['description_SP']
        );

        // Update the Spaceship in the database
        $SpaceshipC->update_Spaceship($Spaceship, $_POST['id_sp']);

// If the form is not submitted or there's an error, redirect to addSpaceship.php
header('Location: addSpaceship.php');
exit();


            header('Location: dashLuggage.php');
            exit();
        }
    } else {
        $error = "All fields are required";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Luggage</title>
    <style>
        /* Basic styling for the popup and overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black */
            display: none;
        }
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: none;
            z-index: 1000; /* Ensure the popup is on top */
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="overlay" id="overlay"></div>

<div class="popup" id="popup">
    <div class="close-btn" onclick="togglePopup()">&times;</div>
    <h1>Ajouter Luggage</h1>
    <form method="POST" onsubmit="return validateForm();">
        <
        <br>
        <div>
            <label for="type_Lu">Type:</label>
            <input type="text" class="form-control p-2" name="type_Lu" id="type_Lu" placeholder="Type" required>
        </div>
        <br>
        <div>
            <label for="weight_Lu">Weight:</label>
            <input type="number" class="form-control p-2" name="weight_Lu" id="weight_Lu" placeholder="Weight" required>
        </div>
        <br>
        <div>
            <input class="btn btn-success" type="submit" name="ajouter" value="Ajouter">
        </div>
    </form>
    <?php if (!empty($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</div>



<script>
    function validateForm() {
        var id_luggage = document.getElementById("id_luggage").value;
        var type_Lu = document.getElementById("type_Lu").value;
        var weight_Lu = document.getElementById("weight_Lu").value;

        if (id_luggage === "" || type_Lu === "" || weight_Lu === "") {
            alert("All fields are required");
            return false;
        }

        if (isNaN(weight_Lu)) {
            alert("Weight must be numeric");
            return false;
        }

        return true;
    }

    function togglePopup() {
        var overlay = document.getElementById("overlay");
        var popup = document.getElementById("popup");

        if (overlay.style.display === "block" && popup.style.display === "block") {
            overlay.style.display = "none";
            popup.style.display = "none";
        } else {
            overlay.style.display = "block";
            popup.style.display = "block";
        }
    }
</script>

</body>
</html>
