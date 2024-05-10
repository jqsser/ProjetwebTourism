
            <?php
include '../Controller/SpaceshipC.php';


$SpaceshipC = new SpaceshipC();
$SpaceshipC->delete_Spaceship($_POST["id_sp"]);
header('Location:ListeSpaceship.php');

?>