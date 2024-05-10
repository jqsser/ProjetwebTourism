<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

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
        $age >= 18 && $age <= 60 && 
        $gender === "male" || $gender === "female" && 
        $chestpain_type ==="nap" &&
        $resting_bp >= 90 && $resting_bp <= 120 && 
        $cholesterol <= 200 && 
        $fastingBS <= 100 && 
        $normalESG >= 60 && $normalESG <= 100 && 
        $maxHR >= 60 && $maxHR <= 100 && 
        $exercise === "yes" || $exercise === "no" && 
        $oldpeak == 1 && 
        $ST_slope === "up" && 
        $Heart_disease === "no" 
    ) {
        return 1; 
    } else {
        return 0; 
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
        header('Location:index.html');
        
        
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <title>health status</title>

    
    <style>
    /* Basic styling for the form and popup */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        
        
        width: 100%;
        height: 100%;
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
        color: white;
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
table {
            margin-top: -680px; /* Adjust as needed */
            margin-left: 500px; /* Adjust as needed */
            width: 40%;
            
        }
        /*design back*/
        .large-header {
   position: relative;
   width: 100%;
  
   
   background: #111;
   overflow: hidden;
   background-size: cover;
   background-position: center center;
   z-index: 1;
}

.demo .large-header {
   background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/demo-bg.jpg");
   
}

.main-title {
   position: absolute;
   margin: 0;
   padding: 5;
   color: #F9F1E9;
   text-align: center;
   top: 50%;
   left: 50%;
   -webkit-transform: translate3d(-40%, -30%, 0);
   transform: translate3d(-40%, -30%, 0);
}

.demo .main-title {
   text-transform: uppercase;
   font-size: 2.2em;
   letter-spacing: 2.1em;
}

.main-title .thin {
   font-weight: 200;
}

@media only screen and (max-width: 768px) {
   .demo .main-title {
      font-size: 3em;
   }
}
/*css boutton add */
.btn {
            position: relative; /* Position relative to its normal position within the table cell */
            left: -100px; /* Move the button 10px to the left */
            top: 20px; /* Move the button 10px to the top */
            background-color: transparent; /* Set background color to transparent */
            color: white; /* Set text color to white */
            border: 2px solid white; /* Set border to white with 2px width */
            padding: 10px 20px; /* Add padding to the button */
            font-size: 16px; /* Set font size */
            width: 200px; /* Adjust the width to your desired value */
        }

        #myTable {
  margin-left: 70;
  margin-top: -425;
}
#myTabless {
  margin-left: 740;
  margin-top: -520;
}
body {
    margin: 0;
    padding: 0;
  }
  h1 {
    color: white;
    position: absolute;
    top: 0;
    left: 530;
    font-size: 50px;
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
        messageElement.innerHTML = "";
       // Set color to green for valid input
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
        messageElement.innerHTML = "";
         // Set color to green for valid input
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
        messageElement.innerHTML = "";
         // Set color to green for valid input
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
        messageElement.innerHTML = "";
         // Set color to green for valid input
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
        messageElement.innerHTML = "";
         // Set color to green for valid input
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
        messageElement.innerHTML = "";
       ; // Set color to green for valid input
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
        messageElement.innerHTML = "";
         // Set color to green for valid input
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
        messageElement.innerHTML = "";
         // Set color to green for valid input
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
        messageElement.innerHTML = "";
       // Set color to green for valid input
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
        messageElement.innerHTML = "";
        // Set color to green for valid input
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
        messageElement.innerHTML = "";
        // Set color to green for valid input
        return true;
    }
}









    </script>
</head>

<body>

    
<div class="container demo">
   <div class="content">
      <div id="large-header" class="large-header">
      <h1>Travel health form</h1>
      <canvas id="demo-canvas"></canvas>
      
        
<form action="" method="POST">
    

      

        <table  id="myTabless" align="center">
        
       
           
                    <tr>
                <td>
                <label for="normalESG">normal ESG:
                    </label>
                    </td>
                
                <td><input type="text" name="normalESG" id="normalESG" onblur="verifiernormalecg()" required=""><br></br>
                <span id="normalmessage" style="color: red;"></span>

                    </td>
            
            
                    </tr>
                    
                    <tr>
                <td>
                <label for="maxHR">maximum heart rate:
                    </label></td>
                
                <td><input type="text" name="maxHR" id="maxHR" onblur="verifiermaxhr()"required=""><br></br>
                <span id="maxmessage" style="color: red;"></span>
                    </td>
            
            
                    </tr>
                    <tr>
                <td>
                <label for="exercise">exercise:
                    </label></td>
                
                <td><input type="text" name="exercise" id="exercise" onblur="verifierexercise()" required=""><br></br>
                <span id="exercisemessage" style="color: red;"></span>
                    </td>
            
            
                    </tr>
                    <tr>
                <td>
                <label for="oldpeak">oldpeak:
                    </label></td>
                
                <td><input type="text" name="oldpeak" id="oldpeak" onblur="verifierold()" required=""><br></br>
                <span id="oldmessage" style="color: red;"></span>
                    </td>
            
            
                    </tr>
                    <tr>
                <td>
                <label for="ST_slope">heart rate slope:
                    </label></td>
                
                <td><input type="text" name="ST_slope" id="ST_slope" onblur="verifierhrslope()" required=""><br></br>
                <span id="stmessage" style="color: red;"></span>
                
                    </td>
            
            
                    </tr>
                    <tr>
                <td>
                <label for="Heart_disease">heart disease:
                    </label></td>
                
               <td> <input type="text" name="Heart_disease" id="Heart_disease" onblur="verifierhdisease()"required=""><br></br>
               
                <span id="hmessage" style="color: red;"></span>
                    </td>
            
            
                    </tr>
             
                   
                    <tr>
                <td>
                
                <button type="submit" onclick="submitForm()" class="btn">Submit</button>
                
            
                    </td>
                    </tr>
                    </table>
                    



                    <table  id="myTable" align="center">
        
       
        <tr>
            <td>
        <!-- <div class="form-group">
                <label for="id_st">health's id:
                </label>
            
            <input type="number" name="id_st" id="id_st" onblur="verifierEntier()">
            <span id="message" style="color: red;"></span>
            </div> -->
                </tr>
                </td>
                <tr>
            <td>
            
                <label for="age">age:
                </label></td>
            
            <td><input type="text" name="age" id="age" onblur="verifierEntier()" required=""><br></br>
            <span id="message" style="color: red;"></span></td>
                </tr>
                <tr>
            <td>
            
                <label for="gender">gender:
                </label></td>
            
            <td><input type="text" name="gender" id="gender" onblur="verifierGender()" required=""><br></br>
            <span id="genderMessage" style="color: red;"></span>
                </td>
                </tr>
                <tr>
            <td>
                <label for="chestpain_type">chest pain type:
                </label></td>
            
            
                <td><input type="text" name="chestpain_type" id="chestpain_type" onblur="verifierchestpaintype()" required=""><br></br>
                <span id="paintypeMessage" style="color: red;"></span>
                </td>
            
        
                </tr>
                <tr>
            <td>
            
                <label for="resting_bp">resting blood pressure:
                </label></td>
            
            
                <td><input type="text" name="resting_bp" id="resting_bp" onblur="verifierRestingBP()" required=""><br></br>
                <span id="restingBPMessage" style="color: red;"></span>
                </td>
            
        
        
                </tr>
                <tr>
            <td>
                <label for="cholesterol">cholesterol:
                </label></td>
            
            <td><input type="text" name="cholesterol" id="cholesterol" onblur="verifiercho()"required=""><br></br>
            <span id="cholesterolMessage" style="color: red;"></span>
                </td>
        
        
                </tr>
            <td>
                <label for="fastingBS">fasting blood sugar:
                </label></td>
            
            <td><input type="text" name="fastingBS" id="fastingBS" onblur="verifierfastingbs()" required=""><br></br>
            <span id="fastingMessage" style="color: red;"></span>
                </td>
        
        
                </tr>
                
               
                </table>
                  
        
    </form>
    </div>
   </div>
</div>
    
    <!-- Display error message if any -->
    <?php if (!empty($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <script>
    function submitForm() {
        if($health==0){
        $mail = new PHPMailer(true);
				
				try {
					$mail->SMTPDebug = 2;                                       
					$mail->isSMTP();                                            
					$mail->Host       = 'smtp-relay.brevo.com;';                    
					$mail->SMTPAuth   = true;                             
					$mail->Username   = 'azizayed85@gmail.com';                 
					$mail->Password   = 'nYHU2vpMBJDLQ6OP';                        
					$mail->SMTPSecure = 'tls';                              
					$mail->Port       = 587;  
				
					$mail->setFrom('azizayed85@gmail.com', 'aziz');           
					$mail->addAddress('Oussema.Fazzeni@esprit.tn');
					
					
					$mail->isHTML(true);                                  
					$mail->Subject = "confirmation of travelling with spacey";
					$mail->Body    = "sorry you can't fly to space";
					$mail->AltBody = 'Body in plain text for non-HTML mail clients';
					$mail->send();
					echo "Mail has been sent successfully!";
				} catch (Exception $e) {
					echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}}
                else{
                    $mail = new PHPMailer(true);
				
				try {
					$mail->SMTPDebug = 2;                                       
					$mail->isSMTP();                                            
					$mail->Host       = 'smtp-relay.brevo.com;';                    
					$mail->SMTPAuth   = true;                             
					$mail->Username   = 'azizayed85@gmail.com';                 
					$mail->Password   = 'nYHU2vpMBJDLQ6OP';                        
					$mail->SMTPSecure = 'tls';                              
					$mail->Port       = 587;  
				
					$mail->setFrom('azizayed85@gmail.com', 'aziz');           
					$mail->addAddress('Oussema.Fazzeni@esprit.tn');
					
					
					$mail->isHTML(true);                                  
					$mail->Subject = "confirmation of travelling with spacey";
					$mail->Body    = "you are able to do a reservation";
					$mail->AltBody = 'Body in plain text for non-HTML mail clients';
					$mail->send();
					echo "Mail has been sent successfully!";
				} catch (Exception $e) {
					echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}

                }
    }

    
</script>
    <script >
        (function() {

var width, height, largeHeader, canvas, ctx, points, target, animateHeader = true;

// Main
initHeader();
initAnimation();
addListeners();

function initHeader() {
    width = window.innerWidth;
    height = window.innerHeight;
    target = {x: width/2, y: height/2};

    largeHeader = document.getElementById('large-header');
    largeHeader.style.height = height+'px';

    canvas = document.getElementById('demo-canvas');
    canvas.width = width;
    canvas.height = height;
    ctx = canvas.getContext('2d');

    // create points
    points = [];
    for(var x = 0; x < width; x = x + width/20) {
        for(var y = 0; y < height; y = y + height/20) {
            var px = x + Math.random()*width/20;
            var py = y + Math.random()*height/20;
            var p = {x: px, originX: px, y: py, originY: py };
            points.push(p);
        }
    }

    // for each point find the 5 closest points
    for(var i = 0; i < points.length; i++) {
        var closest = [];
        var p1 = points[i];
        for(var j = 0; j < points.length; j++) {
            var p2 = points[j]
            if(!(p1 == p2)) {
                var placed = false;
                for(var k = 0; k < 5; k++) {
                    if(!placed) {
                        if(closest[k] == undefined) {
                            closest[k] = p2;
                            placed = true;
                        }
                    }
                }

                for(var k = 0; k < 5; k++) {
                    if(!placed) {
                        if(getDistance(p1, p2) < getDistance(p1, closest[k])) {
                            closest[k] = p2;
                            placed = true;
                        }
                    }
                }
            }
        }
        p1.closest = closest;
    }

    // assign a circle to each point
    for(var i in points) {
        var c = new Circle(points[i], 2+Math.random()*2, 'rgba(255,255,255,0.3)');
        points[i].circle = c;
    }
}

// Event handling
function addListeners() {
    if(!('ontouchstart' in window)) {
        window.addEventListener('mousemove', mouseMove);
    }
    window.addEventListener('scroll', scrollCheck);
    window.addEventListener('resize', resize);
}

function mouseMove(e) {
    var posx = posy = 0;
    if (e.pageX || e.pageY) {
        posx = e.pageX;
        posy = e.pageY;
    }
    else if (e.clientX || e.clientY)    {
        posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
        posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }
    target.x = posx;
    target.y = posy;
}

function scrollCheck() {
    if(document.body.scrollTop > height) animateHeader = false;
    else animateHeader = true;
}

function resize() {
    width = window.innerWidth;
    height = window.innerHeight;
    largeHeader.style.height = height+'px';
    canvas.width = width;
    canvas.height = height;
}

// animation
function initAnimation() {
    animate();
    for(var i in points) {
        shiftPoint(points[i]);
    }
}

function animate() {
    if(animateHeader) {
        ctx.clearRect(0,0,width,height);
        for(var i in points) {
            // detect points in range
            if(Math.abs(getDistance(target, points[i])) < 4000) {
                points[i].active = 0.3;
                points[i].circle.active = 0.6;
            } else if(Math.abs(getDistance(target, points[i])) < 20000) {
                points[i].active = 0.1;
                points[i].circle.active = 0.3;
            } else if(Math.abs(getDistance(target, points[i])) < 40000) {
                points[i].active = 0.02;
                points[i].circle.active = 0.1;
            } else {
                points[i].active = 0;
                points[i].circle.active = 0;
            }

            drawLines(points[i]);
            points[i].circle.draw();
        }
    }
    requestAnimationFrame(animate);
}

function shiftPoint(p) {
    TweenLite.to(p, 1+1*Math.random(), {x:p.originX-50+Math.random()*100,
        y: p.originY-50+Math.random()*100, ease:Circ.easeInOut,
        onComplete: function() {
            shiftPoint(p);
        }});
}

// Canvas manipulation
function drawLines(p) {
    if(!p.active) return;
    for(var i in p.closest) {
        ctx.beginPath();
        ctx.moveTo(p.x, p.y);
        ctx.lineTo(p.closest[i].x, p.closest[i].y);
        ctx.strokeStyle = 'rgba(156,217,249,'+ p.active+')';
        ctx.stroke();
    }
}

function Circle(pos,rad,color) {
    var _this = this;

    // constructor
    (function() {
        _this.pos = pos || null;
        _this.radius = rad || null;
        _this.color = color || null;
    })();

    this.draw = function() {
        if(!_this.active) return;
        ctx.beginPath();
        ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
        ctx.fillStyle = 'rgba(156,217,249,'+ _this.active+')';
        ctx.fill();
    };
}

// Util
function getDistance(p1, p2) {
    return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
}

})();
    </script>
</body>

</html>

