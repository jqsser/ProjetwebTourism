<?php
include '../controller/AsrclientC.php';

$idx = $_POST['idx']; // Retrieve the submitted idx value

if (isset($idx)) {
    $asrclientC = new AsrclientC();
    $assurance = $asrclientC->showassurance($idx); // Fetch assurance details

    if ($assurance) {
        echo "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Assurance Details</title>
<style>
    table {
        width: 80%; /* Set table width */
        margin: 0 auto; /* Center the table horizontally */
        font-size: 20px; /* Increase font size */
    }
    th, td {
        padding: 15px; /* Add padding to cells for better spacing */
        text-align: center; /* Center align cell content */
    }
    h1 {
        text-align: center; /* Center align the title */
        font-size: 36px; /* Increase font size for the title */
    }
</style>
</head>
<body>";

        echo "<h1> Your assurance</h1>"; // Add the title

        echo "<table border='1'>";
        echo "<tr><th>idx</th><th>type_assur</th><th>datedebut</th><th>datefin</th><th>asrprovider</th><th>cost</th></tr>";
        echo "<tr>";
        echo "<td>" . $assurance['id_assur'] . "</td>";
        echo "<td>" . $assurance['type_assur'] . "</td>";
        echo "<td>" . $assurance['datedebut'] . "</td>";
        echo "<td>" . $assurance['datefin'] . "</td>";
        echo "<td>" . $assurance['asrprovider'] . "</td>";
        echo "<td>" . $assurance['cost'] . "</td>";
        echo "</tr>";
        echo "</table>";

        echo "</body>
</html>";
    } else {
       echo "<script>alert('Your ID doesn\'t exist');</script>";
    }
} else {
    echo "No idx value submitted.";
}
?>
