<?php

include '../controller/AsrclientC.php' ;

$error = "";

// create assurance
$assurance = null;

// create an instance of the controller
$assuranceC = new AsrclientC();
if (
    
    isset($_POST["type_assur"]) &&
    isset($_POST["datedebut"]) &&
    isset($_POST["datefin"]) &&
    isset($_POST["clienthealth"]) &&
    isset($_POST["asrprovider"]) &&
    isset($_POST["cost"]) &&
    isset($_POST["type"]) &&
    isset($_POST["heaid"])
) {
    if (
        
        !empty($_POST["type_assur"]) &&
        !empty($_POST["datedebut"]) &&
        !empty($_POST["datefin"]) &&
        !empty($_POST["clienthealth"]) &&
        !empty($_POST["asrprovider"]) &&
        !empty($_POST["cost"]) &&
        !empty($_POST["type"]) &&
        !empty($_POST["heaid"])
    ) {
        $assurance = new Asrclient(
            NULL,
            $_POST['type_assur'],
            new DateTime($_POST['datedebut']),
            new DateTime($_POST['datefin']),
            $_POST['clienthealth'],
            $_POST['asrprovider'],
            $_POST['cost'],
            $_POST['type'],
            $_POST['heaid']
           
        );
        $assuranceC->addassurance($assurance);
        header('Location:readassur.php');
    } else
        $error = "Missing information";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add assurance</title>
    <style>
        /* Existing CSS styles... */
        
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
            max-height: 80vh; /* Set maximum height for the popup */
            overflow-y: auto; /* Enable vertical scrolling */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow to popup */
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
            display: block; /* Change display to block for labels */
            margin-bottom: 5px;
            font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5); /* Add a subtle shadow effect */
            font-size: 16px; /* Adjust font size for consistency */
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
    <script>
        function verifiertype() {
    var valeur = document.getElementById("type_assur").value.toLowerCase();
    var messageElement = document.getElementById("typeMessage");

    // Check if the input is neither "male" nor "female"
    if (valeur !== "client" && valeur !== "spaceship") {
        messageElement.innerHTML = "Please type either 'client' or 'spaceship'.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifierprovider() {
            var valeur = document.getElementById("asrprovider").value;
            var messageElement = document.getElementById("asrMessage");

            // Check if the input contains only letters (characters)
            if (!/^[a-zA-Z]+$/.test(valeur)) {
                messageElement.innerHTML = "Please type the name of the assurance provider.";
                messageElement.style.color = "red"; // Set color to red for invalid input
                return false;
            } else {
                messageElement.innerHTML = "Acceptable";
                messageElement.style.color = "green"; // Set color to green for valid input
                return true;
            }
        }
function verifiertypeassurance() {
    var valeur = document.getElementById("type").value.toLowerCase();
    var messageElement = document.getElementById("typMessage");

    // Check if the input is neither "male" nor "female"
    if (valeur !== "client safety" && valeur !== "spaceship damage") {
        messageElement.innerHTML = "Please type either 'client safety' or 'spaceship damage'.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}


    </script>
</head>

<body>
    <div class="overlay" id="overlay">    </div>
    <div class="popup" id="popup">
        <hr>
        <div id="error">
            <?php echo $error; ?>
        </div>
        <form action="createassur.php" method="POST">
        <h1 class="page-title">Add assurance</h1>
            <span class="close-btn" onclick="toggleAjoutSPPopup()">&times;</span>
            <div class="container">
            <div class="form-group">
                    <label for="type_assur">Type of assurance:</label>
                    <input type="text" name="type_assur" id="type_assur" onblur="verifiertype()" required="">
                    <span id="typeMessage" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="datedebut">Date début:</label>
                    <input type="date" name="datedebut" id="datedebut" style="width:500px;">
                </div>
                <div class="form-group">
                    <label for="datefin">Date fin:</label>
                    <input type="date" name="datefin" id="datefin" style="width:500px;" >
                </div>
                <div class="form-group">
                    <label for="clienthealth">Client health:</label>
                    <input type="number" name="clienthealth" id="clienthealth" required="">
                </div>
                <div class="form-group">
                    <label for="asrprovider">Assurance provider:</label>
                    <input type="text" name="asrprovider" id="asrprovider" onblur=" verifierprovider()" required="">
                    <span id="asrMessage" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="cost">Cost:</label>
                    <input type="number" name="cost" id="cost" step="any" required="">
                </div>
                <div class="form-group">
                    <label for="type">type:</label>
                    <input type="text" name="type" id="type" onblur="verifiertypeassurance()" required="">
                    <span id="typMessage" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="heaid">ID of health status:</label>
                    <input type="number" name="heaid" id="heaid" required="">
                </div>
                <button type="submit" class="btn">Add</button>
                </div>
        </form>
    </div>


    <script>
        

        function toggleAjoutSPPopup() {
            var popup = document.getElementById("popup");
            popup.style.display = (popup.style.display === "block") ? "none" : "block";
            document.getElementById("overlay").style.display = (popup.style.display === "block") ? "block" : "none";
        }
    </script>

</body>

</html>
