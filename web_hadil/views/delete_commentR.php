<?php
include '../controller/commentRC.php';


$commentcr = new commentcr();
$commentcr->delete_commentr($_POST["id_cr"]);
header('Location:ListCommentR.php');

?>