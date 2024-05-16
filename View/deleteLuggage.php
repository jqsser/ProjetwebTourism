
            <?php
include '../Controller/LuggageC.php';


$LuggageC = new LuggageC();
$LuggageC->delete_Luggage($_POST["id_luggage"]);
header('Location:dashLuggage.php');

?>