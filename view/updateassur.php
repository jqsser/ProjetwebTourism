<?php

include '../controller/AsrclientC.php';

$error = "";

// create assurance
$assurance = null;

// create an instance of the controller
$assuranceC = new AsrclientC();
if (
    isset($_POST["id_assur"]) &&
    isset($_POST["type_assur"]) &&
    isset($_POST["datedebut"]) &&
    isset($_POST["datefin"]) &&
    isset($_POST["clienthealth"])&&
    isset($_POST["asrprovider"]) &&
    isset($_POST["cost"]) &&
    isset($_POST["type"]) 
    
) {
    if (
        !empty($_POST["id_assur"]) &&
        !empty($_POST['type_assur']) &&
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
        $assuranceC->updateassurance($assurance, $_POST["id_assur"]);
        header('Location:readassur.php');
    } else
        $error = "Missing information";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modify assurance</title>
</head>

<body>
    <button><a href="readassur.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_assur'])) {
        $assurance = $assuranceC->showassurance($_POST['id_assur']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_assur">id d'assurance':
                        </label>
                    </td>
                    <td><input type="number" name="id_assur" id="id_assur" value="<?php echo $assurance['id_assur']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="type_assur">type d'assurance':
                        </label>
                    </td>
                    <td><input type="text" name="type_assur" id="type_assur" value="<?php echo $assurance['type_assur']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="datedebut">date debut:
                        </label>
                    </td>
                    <td><input type="date" name="datedebut" id="datedebut" value="<?php echo $assurance['datedebut']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="datefin">date fin:
                        </label>
                    </td>
                    <td><input type="date" name="datefin" id="datefin" value="<?php echo $assurance['datefin']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="clienthealth">client health:
                        </label>
                    </td>
                    <td><input type="number" name="clienthealth" id="clienthealth" value="<?php echo $assurance['clienthealth']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="asrprovider">assurance provider:
                        </label>
                    </td>
                    <td><input type="text" name="asrprovider" id="asrprovider" value="<?php echo $assurance['asrprovider']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="cost">cost:
                        </label>
                    </td>
                    <td><input type="number" name="cost" id="cost" value="<?php echo $assurance['cost']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="type">type:
                        </label>
                    </td>
                    <td><input type="text" name="type" id="type" value="<?php echo $assurance['type']; ?>" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>