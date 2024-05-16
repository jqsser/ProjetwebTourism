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
                .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-blue {
            background-color: #3498db;
            color: #fff;
        }
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
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #000;
            background-color: #fff;
            padding: 20px;
            z-index: 9999;
        }
        .close-btn {
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 10px;
        }

        /* Additional styles for labels in the popup */
        .popup label {
            display: inline-block;
            margin-bottom: 5px;
            font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5); /* Add a subtle shadow effect */
        }

        /* Styles for input fields and textareas */
        .popup input[type="text"],
        .popup input[type="number"],
        .popup textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
            background-color: #f2f2f2;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }

        .popup input[type="text"]:focus,
        .popup input[type="number"]:focus,
        .popup textarea:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5); /* Add focus effect */
        }
    </style>
    <div class="container">
    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <span class="close-btn" onclick="toggleAjoutSPPopup()">&times;</span>
        <div class="container">
            <h2>Add Spaceship</h2>
            <!--<form action="addSpaceship.php" method="POST" onsubmit="return validateFormSpAdd()">-->
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
                    <button type="submit" class="btn btn-blue">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validateFormSpAdd() {
        var Sp_model = document.getElementById("update_Sp_model").value.trim();
        var NbSp_place = document.getElementById("update_NbSp_place").value.trim();
        var NbSp_voyage = document.getElementById("update_NbSp_voyage").value.trim();
        var description_SP = document.getElementById("update_description_SP").value.trim();

        // Reset error messages
        document.getElementById("modelError").textContent = "";
        document.getElementById("placeError").textContent = "";
        document.getElementById("voyageError").textContent = "";
        document.getElementById("descriptionError").textContent = "";

        // Check if Model is not a number and less than 8 characters
        if (isNaN(Sp_model) || Sp_model.length >= 8) {
            document.getElementById("modelError").textContent = "Model must be less than 8 characters and should not contain numbers";
            return false;
        }

        // Check if Number of Places is not a number or greater than 50
        if (isNaN(NbSp_place) || NbSp_place <= 0 || NbSp_place > 50) {
            document.getElementById("placeError").textContent = "Number of Places must be a positive number less than or equal to 50";
            return false;
        }

        // Check if Number of Voyages is not a number or not positive
        if (isNaN(NbSp_voyage) || NbSp_voyage <= 0) {
            document.getElementById("voyageError").textContent = "Number of Voyages must be a positive number";
            return false;
        }

        // Check if Description length exceeds 300 characters
        if (description_SP.length >= 300) {
            document.getElementById("descriptionError").textContent = "Description must be less than 300 characters";
            return false;
        }

        return true
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
