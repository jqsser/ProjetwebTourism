<?php

include '../controller/HealthstatusC.php';

$error = "";

// create assurance
$healthstatus = null;

// create an instance of the controller
$healthstatusC = new HealthstatusC();
if (
    isset($_POST["id_st"]) &&
    isset($_POST["age"]) &&
    isset($_POST["gender"]) &&
    isset($_POST["chestpain_type"]) &&
    isset($_POST["resting_bp"]) &&
    isset($_POST["cholesterol"])&&
    isset($_POST["fastingBS"]) &&
    isset($_POST["normalESG"]) &&
    isset($_POST["maxHR"]) &&
    isset($_POST["exercise"]) &&
    isset($_POST["oldpeak"]) &&
    isset($_POST["ST_slope"]) &&
    isset($_POST["Health_disease"]) &&
    isset($_POST["health"]) 
    
) {
    if (
        !empty($_POST["id_st"]) &&
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
        !empty($_POST["Heart_disease"]) &&
        !empty($_POST["health"]) 
    ) {
        $healthstatus = new Healthstatus(
            ($_POST["id_st"]) &&
            ($_POST["age"]) &&
            ($_POST["gender"]) &&
            ($_POST["chestpain_type"]) &&
            ($_POST["resting_bp"]) &&
            ($_POST["cholesterol"]) &&
            ($_POST["fastingBS"]) &&
            ($_POST["normalESG"]) &&
            ($_POST["maxHR"]) &&
            ($_POST["exercise"]) &&
            ($_POST["oldpeak"]) &&
            ($_POST["ST_slope"]) &&
            ($_POST["Heart_disease"]) &&
            ($_POST["health"]) 
            
        );
        $healthstatusC->updatestatus($healthstatus, $_POST["id_st"]);
        header('Location:readhstatus.php');
       
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modify health status</title>
    <style>
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
</style>

<script>
    
</script>

</head>

<body>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <?php
    if (isset($_POST['id_st'])) {
        $healthstatus = $healthstatusC->showstatus($_POST['id_st']);

    ?>

<form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                    <label for="id_st">health's id:
                    </label></td>
                
               <td> <input type="number" name="id_st" id="id_st" value="<?php echo $healthstatus['id_st']; ?>"></td>
               <tr>
                    <td>
                    <label for="age">age:
                    </label></td>
                
                <td><input type="text" name="age" id="age"  value="<?php echo $healthstatus['age']; ?>"></td>
                
                <tr>
                    <td>
                    <label for="gender">gender:
                    </label></td>
                
                <td><input type="text" name="gender" id="gender" value="<?php echo $healthstatus['gender']; ?>"></td>
            
            
                <tr>
                    <td>
                    <label for="chestpain_type">chest pain type:
                    </label></td>
                
                
                   <td> <input type="text" name="chestpain_type" id="chestpain_type" value="<?php echo $healthstatus['chestpain_type']; ?>"></td>
                   <tr>
                    <td>
                    <label for="resting_bp">resting blood pressure:
                    </label></td>
                
                   <td><input type="text" name="resting_bp" id="resting_bp" value="<?php echo $healthstatus['resting_bp']; ?>"></td>
                   <tr>
                    <td>
                    <label for="cholesterol">cholesterol:
                    </label></td>
                
               <td> <input type="text" name="cholesterol" id="cholesterol" value="<?php echo $healthstatus['cholesterol']; ?>"></td>
            
            
               <tr>
                    <td>
                    <label for="fastingBS">fasting blood sugar:
                    </label></td>
                
                <td><input type="text" name="fastingBS" id="fastingBS" value="<?php echo $healthstatus['fastingBS']; ?>"></td>
            
            
                <tr>
                    <td>
                    <label for="normalESG">normal ESG:
                    </label></td>
                
               <td> <input type="text" name="normalESG" id="normalESG" value="<?php echo $healthstatus['normalESG']; ?>"></td>
            
            
               <tr>
                    <td>
                    <label for="maxHR">maximum heart rate:
                    </label></td>
                
                <td><input type="text" name="maxHR" id="maxHR" value="<?php echo $healthstatus['maxHR']; ?>"></td>
            
            
                <tr>
                    <td>
                    <label for="exercise">exercise:
                    </label></td>
                
               <td> <input type="text" name="exercise" id="exercise" value="<?php echo $healthstatus['exercise']; ?>"></td>
            
            
               <tr>
                    <td>
                    <label for="oldpeak">oldpeak:
                    </label></td>
                
                <td><input type="text" name="oldpeak" id="oldpeak" value="<?php echo $healthstatus['oldpeak']; ?>"></td>
            
        
                <tr>
                    <td>
                    <label for="ST_slope">heart rate slope:
                    </label></td>
                
                <td><input type="text" name="ST_slope" id="ST_slope" value="<?php echo $healthstatus['ST_slope']; ?>"></td>
            
                <tr>
                    <td>
                    <label for="Heart_disease">heart disease:
                    </label></td>
                
                <td><input type="text" name="Heart_disease" id="Heart_disease" value="<?php echo $healthstatus['Heart_disease']; ?>"></td>
            
                <tr>
                    <td>
                    <label for="health">health score:
                    </label></td>
                
                <td><input type="number" name="health" id="health" value="<?php echo $healthstatus['health']; ?>"> </td>
            
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="modify">
                    </td>
                
                </tr>
            </table>
                
                </form>
   
    <?php
    }
    ?>

</body>

</html>