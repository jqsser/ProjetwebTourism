<?php
include '../Controller/ReservationC.php';


$ReservationC = new ReservationC();
$ReservationC->delete_reservation($_POST["id_reserv"]);
header('Location:AdminListe.php');

?>