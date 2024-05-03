<?php
include '../controller/commentC.php';


$commentC = new commentC();
$commentC->delete_comment($_POST["id_c"]);
header('Location:ListCommentDash.php');

?>