<?php
include_once '../Controller/SpaceshipC.php';


$error = "";

$Spaceship = null;

$SpaceshipC = new SpaceshipC();
if (
 
    isset($_POST['Sp_model']) &&
    isset($_POST['NbSp_place']) &&
    isset($_POST['NbSp_voyage']) &&
    isset($_POST['description_SP']) &&
    isset($_POST['id_ELug'])
) {
    if (

        !empty($_POST["Sp_model"]) &&
        !empty($_POST["NbSp_place"]) &&
        !empty($_POST["NbSp_voyage"]) &&
        !empty($_POST["description_SP"]) &&
        !empty($_POST['id_ELug'])
    ) {
        $Spaceship = new Spaceship(
            null,
            $_POST['Sp_model'],
            $_POST['NbSp_place'],
            $_POST['NbSp_voyage'],
            $_POST['description_SP'],
            $_POST['id_ELug']
            
        );
        $SpaceshipC->add_Spaceship($Spaceship,);
        header('Location:dashSpaceship.php');
        exit(); // Ensure script execution stops after redirection
    } else {
        $error = "Missing information";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Spaceship</title>
    <style>
        /* Basic styling for the form and popup */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
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
            width: 80%; /* Set width to 80% of the viewport */
            max-width: 600px; /* Set maximum width to prevent overly wide popups */
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px; /* Increased margin for better spacing */
            display: block;
            font-size: 18px; /* Increased font size */
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box; /* Include padding and border in the width */
        }
        textarea {
            resize: vertical; /* Allow vertical resizing */
            min-height: 100px; /* Set a minimum height for the textarea */
        }
        .btn {
            background-color: #007bff; /* Blue color */
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
            <span class="close-btn" onclick="toggleAjoutSPPopup()">&times;</span>
            <h2>Add Spaceship</h2>
            <form action="addSpaceship.php" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="Sp_model">Model</label>
                <input type="text" id="Sp_model" name="Sp_model" placeholder="Enter Model">
            </div>
            <div class="form-group">
                <label for="NbSp_place">Places</label>
                <input type="number" id="NbSp_place" name="NbSp_place" placeholder="Enter Number of Places">
            </div>
            <div class="form-group">
                <label for="NbSp_voyage">Voyages</label>
                <input type="number" id="NbSp_voyage" name="NbSp_voyage" placeholder="Enter Number of Voyages">
            </div>
            <div class="form-group">
                <label for="description_SP">Description</label>
                <textarea id="description_SP" name="description_SP" placeholder="Enter Description"></textarea>
            </div>
            <div class="form-group">
                <label for="id_ELug">Luggage ID</label>
                <input type="text" id="id_ELug" name="id_ELug" placeholder="Enter Luggage ID">
            </div>
            <div class="form-group" align="center">
                <button type="submit" class="btn">Add</button>
            </div>

            </form>
</div>

<script>
    function validateForm() {
        var Sp_model = document.getElementById("Sp_model").value;
        var NbSp_place = document.getElementById("NbSp_place").value;
        var NbSp_voyage = document.getElementById("NbSp_voyage").value;
        var description_SP = document.getElementById("description_SP").value;

        if (Sp_model.trim() === "" || NbSp_place.trim() === "" || NbSp_voyage.trim() === "" || description_SP.trim() === "") {
            alert("All fields are required");
            return false;
        }
        return true;
    }

    function toggleAjoutSPPopup() {
        var popup = document.getElementById("popup");
        popup.style.display = (popup.style.display === "block") ? "none" : "block";
        document.getElementById("overlay").style.display = (popup.style.display === "block") ? "block" : "none";
    }

</script>


    <!-- Display error message if any -->
    <?php if (!empty($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
