<?php

include '../controller/HealthstatusC.php' ;


$error = "";

// create health status
$healthstatus = null;


// create an instance of the controller
$healthstatusC = new HealthstatusC();
function calculateHealthScore($age, $gender, $chestpain_type, $resting_bp, $cholesterol, $fastingBS, $normalESG, $maxHR, $exercise, $oldpeak, $ST_slope, $Heart_disease) {
    // Your logic for calculating health score goes here
    // You can use the provided data to analyze and determine the health score

    // For demonstration purposes, let's implement a simple logic
    // that checks if all parameters are within normal ranges
    // and sets the health score accordingly

    if (
        $age >= 18 && $age <= 60 && // age between 18 and 60
        $gender === "male" || $gender ==="female" && // gender is male
        $chestpain_type==="nap" &&
        $resting_bp >= 90 && $resting_bp <= 120 && // resting blood pressure between 90 and 120
        $cholesterol <= 200 && // cholesterol less than or equal to 200
        $fastingBS <= 100 && // fasting blood sugar less than or equal to 100
        $normalESG >= 60 && $normalESG <= 100 && // normal ESG between 60 and 100
        $maxHR >= 60 && $maxHR <= 100 && // maximum heart rate between 60 and 100
        $exercise === "yes" && // exercise is yes
        $oldpeak == 1 && // oldpeak is 1
        $ST_slope === "up" && // heart rate slope is up
        $Heart_disease === "no" // no history of heart disease
    ) {
        return 1; // health score is 1 (okay)
    } else {
        return 0; // health score is 0 (not acceptable)
    }
}
if (
   
    isset($_POST["age"]) &&
    isset($_POST["gender"]) &&
    isset($_POST["chestpain_type"]) &&
    isset($_POST["resting_bp"]) &&
    isset($_POST["cholesterol"]) &&
    isset($_POST["fastingBS"]) &&
    isset($_POST["normalESG"]) &&
    isset($_POST["maxHR"]) &&
    isset($_POST["exercise"]) &&
    isset($_POST["oldpeak"]) &&
    isset($_POST["ST_slope"]) &&
    isset($_POST["Heart_disease"])
     
    
) {
    if (
    
        !empty($_POST["age"]) &&
        !empty($_POST["gender"]) &&
        !empty($_POST["chestpain_type"]) &&
        !empty($_POST["resting_bp"]) &&
        !empty($_POST["cholesterol"]) &&
        !empty($_POST["fastingBS"]) &&
        !empty($_POST["normalESG"]) &&
        !empty($_POST["maxHR"]) &&
        !empty($_POST["exercise"]) &&
        !empty($_POST["oldpeak"]) &&
        !empty($_POST["ST_slope"]) &&
        !empty($_POST["Heart_disease"]) 
         
        
    ) {
        $health = calculateHealthScore(
            $_POST['age'],
            $_POST['gender'],
            $_POST['chestpain_type'],
            $_POST['resting_bp'],
            $_POST['cholesterol'],
            $_POST['fastingBS'],
            $_POST['normalESG'],
            $_POST['maxHR'],
            $_POST['exercise'],
            $_POST['oldpeak'],
            $_POST['ST_slope'],
            $_POST['Heart_disease']
        );
        $healthstatus = new Healthstatus(
            NULL,
            $_POST['age'],
            $_POST['gender'],
            $_POST['chestpain_type'],
            $_POST['resting_bp'],
            $_POST['cholesterol'],
            $_POST['fastingBS'],
            $_POST['normalESG'],
            $_POST['maxHR'],
            $_POST['exercise'],
            $_POST['oldpeak'],
            $_POST['ST_slope'],
            $_POST['Heart_disease'],
            $health
            
        );
        $healthstatusC->addstatus($healthstatus);
        
        
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>health status</title>
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
        max-height: 80%; /* Limit height to 80% of the viewport */
        overflow-y: auto; /* Enable vertical scrolling */
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
    .page-title {
    font-size: 36px; /* Adjust the font size as needed */
    text-align: center; /* Center the text horizontally */
    margin-top: -10px; /* Add some top margin to push it down from the top */
}
</style>

    <script>

        function togglePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = (popup.style.display === "block") ? "none" : "block";
            document.getElementById("overlay").style.display = (popup.style.display === "block") ? "block" : "none";
        }
        var entiersExistants = [$_POST["id_st"]]; // Tableau pour stocker les entiers existants

        function verifierEntier() {
    var valeur = document.getElementById("age").value;
    var messageElement = document.getElementById("message");

    // Check if the input is not a number
    if (!/^\d+$/.test(valeur)) {
        messageElement.innerHTML = "you must type a real number of age.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifierRestingBP() {
    var valeur = document.getElementById("resting_bp").value;
    var messageElement = document.getElementById("restingBPMessage");

    // Check if the input is not a number
    if (!/^\d+$/.test(valeur)) {
        messageElement.innerHTML = "type a real number of resting blood pressure(mmhg).";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifiercho() {
    var valeur = document.getElementById("cholesterol").value;
    var messageElement = document.getElementById("cholesterolMessage");

    // Check if the input is not a number
    if (!/^\d+$/.test(valeur)) {
        messageElement.innerHTML = "please type a valid number of cholesterol.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifierfastingbs() {
    var valeur = document.getElementById("fastingBS").value;
    var messageElement = document.getElementById("fastingMessage");

    // Check if the input is not a number
    if (!/^\d+$/.test(valeur)) {
        messageElement.innerHTML = "please type a valid number of fasting blood pressure (mg/dl).";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifierGender() {
    var valeur = document.getElementById("gender").value.toLowerCase();
    var messageElement = document.getElementById("genderMessage");

    // Check if the input is neither "male" nor "female"
    if (valeur !== "male" && valeur !== "female") {
        messageElement.innerHTML = "Please type either 'male' or 'female'.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifierchestpaintype() {
    var valeur = document.getElementById("chestpain_type").value.toLowerCase();
    var messageElement = document.getElementById("paintypeMessage");

    // Check if the input is neither "male" nor "female"
    if (valeur !== "ata" && valeur !== "nap") {
        messageElement.innerHTML = "Please type either 'ATA' or 'NAP'.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifiernormalecg() {
    var valeur = document.getElementById("normalESG").value;
    var messageElement = document.getElementById("normalmessage");

    // Check if the input is not a number
    if (!/^\d+$/.test(valeur)) {
        messageElement.innerHTML = "you must type a real number of normal ECG.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifiermaxhr() {
    var valeur = document.getElementById("maxHR").value;
    var messageElement = document.getElementById("maxmessage");

    // Check if the input is not a number
    if (!/^\d+$/.test(valeur)) {
        messageElement.innerHTML = "you must type a real number of maximum heart rate.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else if (parseInt(valeur) > 480) {
        messageElement.innerHTML = "Please enter a number of maximum heart rate less than or equal to 480.";
        messageElement.style.color = "red"; // Set color to red for numbers greater than 480
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifierexercise() {
    var valeur = document.getElementById("exercise").value.toLowerCase();
    var messageElement = document.getElementById("exercisemessage");

    // Check if the input is neither "male" nor "female"
    if (valeur !== "no" && valeur !== "yes") {
        messageElement.innerHTML = "Please type either 'yes' or 'no'.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
}
function verifierold() {
    var valeur = document.getElementById("oldpeak").value.toLowerCase();
    var messageElement = document.getElementById("oldmessage");

    // Check if the input is neither "0" nor "1"
    if ((valeur !== "0" && valeur !== "1")) {
        messageElement.innerHTML = "type 0 if you have an old peak or 1 if you don't.";
        messageElement.style.color = "red"; // Set color to red for invalid input
        return false;
    } else  {
        messageElement.innerHTML = "Acceptable";
        messageElement.style.color = "green"; // Set color to green for valid input
        return true;
    }
   
}
function verifierhrslope() {
    var valeur = document.getElementById("ST_slope").value.toLowerCase();
    var messageElement = document.getElementById("stmessage");

    // Check if the input is neither "male" nor "female"
    if (valeur !== "up" && valeur !== "flat") {
        messageElement.innerHTML = "Please type either 'up' or 'flat'.";
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
<div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <span class="close-btn" onclick="togglePopup()">&times;</span>
    
        <form action="" method="POST" onsubmit="return validateForm()">
        <h1 class="page-title">Add health status</h1>
            <!-- <div class="form-group">
                    <label for="id_st">health's id:
                    </label>
                
                <input type="number" name="id_st" id="id_st" onblur="verifierEntier()">
                <span id="message" style="color: red;"></span>
                </div> -->
                <div class="container">
                <div class="form-group" >
                    <label for="age">age:
                    </label>
                
                <input type="text" name="age" id="age" onblur="verifierEntier()" required="">
                <span id="message" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="gender">gender:
                    </label>
                
                <input type="text" name="gender" id="gender" onblur="verifierGender()" required="">
                <span id="genderMessage" style="color: red;"></span>
                </div>
            
            
                <div class="form-group">
                    <label for="chestpain_type">chest pain type:
                    </label>
                
                
                    <input type="text" name="chestpain_type" id="chestpain_type" onblur="verifierchestpaintype()" required="">
                    <span id="paintypeMessage" style="color: red;"></span>
                    </div>
                
            
                    <div class="form-group">
                
                    <label for="resting_bp">resting blood pressure:
                    </label>
                
                
                    <input type="text" name="resting_bp" id="resting_bp" onblur="verifierRestingBP()" required="">
                    <span id="restingBPMessage" style="color: red;"></span>
                    </div>
                
            
            
                    <div class="form-group">
                    <label for="cholesterol">cholesterol:
                    </label>
                
                <input type="text" name="cholesterol" id="cholesterol" onblur="verifiercho()"required="">
                <span id="cholesterolMessage" style="color: red;"></span>
                </div>
            
            
                <div class="form-group">
                    <label for="fastingBS">fasting blood sugar:
                    </label>
                
                <input type="text" name="fastingBS" id="fastingBS" onblur="verifierfastingbs()" required="">
                <span id="fastingMessage" style="color: red;"></span>
                </div>
            
            
                <div class="form-group">
                    <label for="normalESG">normal ESG:
                    </label>
                
                <input type="text" name="normalESG" id="normalESG" onblur="verifiernormalecg()" required="">
                <span id="normalmessage" style="color: red;"></span>
                </div>
            
            
                <div class="form-group">
                    <label for="maxHR">maximum heart rate:
                    </label>
                
                <input type="text" name="maxHR" id="maxHR" onblur="verifiermaxhr()"required="">
                <span id="maxmessage" style="color: red;"></span>
                </div>
            
            
                <div class="form-group">
                    <label for="exercise">exercise:
                    </label>
                
                <input type="text" name="exercise" id="exercise" onblur="verifierexercise()" required="">
                <span id="exercisemessage" style="color: red;"></span>
                </div>
            
            
                <div class="form-group">
                    <label for="oldpeak">oldpeak:
                    </label>
                
                <input type="text" name="oldpeak" id="oldpeak" onblur="verifierold()" required="">
                <span id="oldmessage" style="color: red;"></span>
                </div>
            
            
                <div class="form-group">
                    <label for="ST_slope">heart rate slope:
                    </label>
                
                <input type="text" name="ST_slope" id="ST_slope" onblur="verifierhrslope()" required="">
                <span id="stmessage" style="color: red;"></span>
                
                </div>
            
            
                <div class="form-group">
                    <label for="Heart_disease">heart disease:
                    </label>
                
                <input type="text" name="Heart_disease" id="Heart_disease" onblur="verifierhdisease()"required="">
                <span id="hmessage" style="color: red;"></span>
                </div>
            
            
                
            
        
            
                <div class="form-group">
                <button type="submit" class="btn">Ajouter</button>
                
            </div>
            </div>
        
    </form>
    </div>
    <!-- Display error message if any -->
    <?php if (!empty($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>

</html>

