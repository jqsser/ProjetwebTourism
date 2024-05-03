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

<div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
    <span class="close-btn" onclick="togglePopup()">&times;</span>
    <h1>Ajouter Luggage</h1>
    <form method="POST" onsubmit="return validateForm();">
        <br>
        <div>
            <label for="type_Lu">type_Lu:</label>
            <input type="number" class="form-control p-2" name="type_Lu" id="type_Lu" placeholder="type" required>
        </div>
        <div>
            <label for="weight_Lu">Weight:</label>
            <input type="number" class="form-control p-2" name="weight_Lu" id="weight_Lu" placeholder="Weight" required>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn">Ajouter</button>
        </div>
    </form>
</div>

<?php if (!empty($error)) : ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

</body>
</html>
