<?php
include '../controller/HealthstatusC.php';
$healthstatusC = new  HealthstatusC();
$healthstatusC->deletehealthstatus($_GET["id_st"]);
header('Location:readhstatus.php');