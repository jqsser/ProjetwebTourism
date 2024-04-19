<?php

include '../controller/AsrclientC.php' ;
$error = "";

// create employe
$assurance = null;

// create an instance of the controller
$assuranceC = new AsrclientC();
if (
    isset($_POST["id_assur"]) &&
    isset($_POST["type_assur"]) &&
    isset($_POST["datedebut"]) &&
    isset($_POST["datefin"]) &&
    isset($_POST["clienthealth"]) &&
    isset($_POST["asrprovider"]) &&
    isset($_POST["cost"]) &&
    isset($_POST["type"])
) {
    if (
        !empty($_POST["id_assur"]) &&
        !empty($_POST["type_assur"]) &&
        !empty($_POST["datedebut"]) &&
        !empty($_POST["datefin"]) &&
        !empty($_POST["clienthealth"]) &&
        !empty($_POST["asrprovider"]) &&
        !empty($_POST["cost"]) &&
        !empty($_POST["type"])
    ) {
        $assurance = new Asrclient(
            $_POST['id_assur'],
            $_POST['type_assur'],
            new DateTime($_POST['datedebut']),
            new DateTime($_POST['datefin']),
            $_POST['clienthealth'],
            $_POST['asrprovider'],
            $_POST['cost'],
            $_POST['type']
           
        );
        $assuranceC->addassurance($assurance);
        header('Location:ListAssurance.php');
    } else
        $error = "Missing information";
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add assurance</title>
</head>

<body>
    <a href="readassur.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="id_assur">id d'assurance:
                    </label>
                </td>
                <td><input type="number" name="id_assur" id="id_assur"></td>
            </tr>
            <tr>
                <td>
                    <label for="type_assur">type d'assurance:
                    </label>
                </td>
                <td><input type="text" name="type_assur" id="type_assur"></td>
            </tr>
            <tr>
                <td>
                    <label for="datedebut">date debut:
                    </label>
                </td>
                <td>
                    <input type="date" name="datedebut" id="datedebut">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="datefin">date fin:
                    </label>
                </td>
                <td>
                    <input type="date" name="datefin" id="datefin">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="clienthealth">client health:
                    </label>
                </td>
                <td><input type="number" name="clienthealth" id="clienthealth"></td>
            </tr>
            <tr>
                <td>
                    <label for="asrprovider">assurance provider:
                    </label>
                </td>
                <td><input type="text" name="asrprovider" id="asrprovider"></td>
            </tr>
            <tr>
                <td>
                    <label for="cost">cost:
                    </label>
                </td>
                <td><input type="number" name="cost" id="cost" step="any"></td>
            </tr>
            <tr>
                <td>
                    <label for="type">type:
                    </label>
                </td>
                <td><input type="text" name="type" id="type"></td>
            </tr>
            <tr align="center">
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="add">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>