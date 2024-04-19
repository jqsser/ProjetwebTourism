<?php
include '../controller/AsrclientC.php';
$assuranceC = new AsrclientC();
$assuranceC->deleteassurance($_GET["id_assur"]);
header('Location:readassur.php');
