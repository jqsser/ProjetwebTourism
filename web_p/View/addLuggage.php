<?php
include_once '../Controller/LuggageC.php';
include_once '../Model/Luggage.php';

$error = "";

$Luggage = null;

$LuggageC = new LuggageC();
if (
    isset($_POST['type_Lu']) &&
    isset($_POST['weight_Lu'])
) {
    if (
        !empty($_POST["type_Lu"]) &&
        !empty($_POST["weight_Lu"])
    ) {
        $Luggage = new Luggage(
            null,
            $_POST['type_Lu'],
            $_POST['weight_Lu']
        );
        $LuggageC->add_Luggage($Luggage);

        // Redirect to dashLuggage.php after adding the Luggage
        header('Location: dashLuggage.php');
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
    <title>Ajouter Luggage</title>
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
    <script>
        function validateForm() { 
            var type_Lu = document.getElementById("type_Lu").value;
            var weight_Lu = document.getElementById("weight_Lu").value;

            if (type_Lu === "" || weight_Lu === "") {
                alert("All fields are required");
                return false;
            }
            return true;
        }

        function togglePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = (popup.style.display === "block") ? "none" : "block";
            document.getElementById("overlay").style.display = (popup.style.display === "block") ? "block" : "none";
        }
    </script>
</head>
<body>
<div class="container">
<div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
    <span class="close-btn" onclick="togglePopup()">&times;</span>
    <div class="container">
    <h2>Ajouter Luggage</h2>
    <form method="POST" onsubmit="return validateForm();">
        <br>
        <div>
            <label for="type_Lu">type_Lu:</label>
            <input type="number" class="form-control p-2" name="type_Lu" id="type_Lu" placeholder="type" required>
        </div>
        <br>
        <div>
            <label for="weight_Lu">Weight:</label>
            <input type="number" class="form-control p-2" name="weight_Lu" id="weight_Lu" placeholder="Weight" required>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn">Ajouter</button>
        </div>
    </form>
</div></div><

<?php if (!empty($error)) : ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

</body>
</html>
