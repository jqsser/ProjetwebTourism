<?php
require '../config.php';
include '../Model/Destination.php';
include '../Model/Spaceship.php';


class DestinationC{

    public function show_Destination()
    {
        $sql = "SELECT destination.*, spaceship.Sp_model
                FROM destination
                LEFT JOIN spaceship ON destination.id_sp = spaceship.id_sp";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $destinations = $query->fetchAll();
            return $destinations;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function add_Destination(Destination $Destination, $id_sp) {
        // Check if $id_sp is not null or empty before proceeding
        if (!empty($id_sp)) {
            $sql = "INSERT INTO destination (Destination, id_sp, des_details, image_path) VALUES (:Destination, :id_sp, :des_details, :image_path)";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'id_sp' => $id_sp,
                    'Destination' => $Destination->get_Destination(),
                    'des_details' => $Destination->get_des_details(),
                    'image_path' => $Destination->get_image_path(),
                ]);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        } else {
            echo "Error: id_sp is null or empty.";
        }
    }



    public function update_Destination($Destination, $Destination_id)
    { 
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE destination SET 
                 id_sp = :id_sp,
                 Destination = :Destination,
                 des_details = :des_details
                 WHERE Destination_id = :Destination_id'
            );
            $query->execute([
                'Destination_id' => $Destination_id,
                'id_sp' => $Destination->get_id_sp(),
                'Destination' => $Destination->get_Destination(),
                'des_details' => $Destination->get_des_details(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete_Destination($Destination_id)
    {
        // First, delete associated reservations
    $reservationC = new ReservationC();
    $reservations = $reservationC->getReservationsByDestination($Destination_id);
    foreach ($reservations as $reservation) {
        $reservationC->delete_reservation($reservation['id_reserv']);
    }

    // Then, delete the destination
    $sql = "DELETE FROM destination WHERE Destination_id = :Destination_id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':Destination_id', $Destination_id);

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
    }


  

    public function recupererDestination($Destination_id){
        $sql = "SELECT * FROM destination WHERE Destination_id = :Destination_id";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->bindParam(':Destination_id', $Destination_id);
            $query->execute();

            $Destination = $query->fetch(PDO::FETCH_ASSOC);
            return $Destination;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    
    function rechercheDestination($rech)
    {
        $sql = "SELECT * FROM destination WHERE Destination LIKE '%$rech%'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $destinations = $query->fetchAll(PDO::FETCH_ASSOC);
            return $destinations;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    

    public function getAllSpacehips()
{
    $sql = "SELECT * FROM spaceship";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $spacehips = $query->fetchAll();
        return $spacehips;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }


}

public function getSpaceshipById($id) {
    // Préparez la requête SQL pour récupérer les informations du vaisseau spatial en fonction de son ID
    $query = "SELECT * FROM spaceship WHERE id_sp = :id";

    // Get the database connection statically from the config class
    $db = config::getConnexion();

    // Préparez la déclaration de la requête using the database connection
    $statement = $db->prepare($query);

    // Liez les paramètres
    $statement->bindParam(':id', $id);

    // Exécutez la requête
    $statement->execute();

    // Récupérez les résultats
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Vérifiez si des résultats ont été trouvés
    if ($result) {
        // Retournez les informations du vaisseau spatial
        return $result;
    } else {
        // Si aucun résultat n'est trouvé, retournez NULL ou un tableau vide selon votre choix
        return NULL;
    }
}

public function getDestinationsByspaceship($id_sp) {
    $sql = "SELECT * FROM destination WHERE id_sp = :id_sp";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['id_sp' => $id_sp]);
        $destinations = $query->fetchAll(PDO::FETCH_ASSOC);
        return $destinations ;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
}


class SpaceshipC{


    public function show1_Spaceship($id_sp)
    {
        $sql = "SELECT * FROM spaceship WHERE WHERE id_sp = :id_sp";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Spaceships = $query->fetchAll(); 
            return $Spaceships;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function rechercheSpmodel($rech)
    {
        $sql = "SELECT * FROM spaceship WHERE Sp_model LIKE '%$rech%'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reservations = $query->fetchAll(PDO::FETCH_ASSOC);
            return $reservations;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function show_Spaceship_Luggage()
    {
        $sql = "SELECT spaceship.id_sp, spaceship.Sp_model, spaceship.NbSp_place, spaceship.NbSp_voyage, spaceship.description_SP, luggage.id_luggage, luggage.type_Lu, luggage.weight_Lu
                FROM spaceship
                LEFT JOIN luggage ON spaceship.id_ELug = luggage.id_luggage";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(); 
            return $data;
        } catch (Exception $e) {
            die('Error fetching data: ' . $e->getMessage());
        }
    }
    public function show_Spaceship()
    {
        $sql = "SELECT * FROM spaceship  ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Spaceships = $query->fetchAll(); 
            return $Spaceships;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function add_Spaceship(Spaceship $Spaceship)
    {
        $sql = "INSERT INTO spaceship (id_sp, Sp_model, NbSp_place, NbSp_voyage, description_SP, id_ELug) 
                VALUES (:id_sp, :Sp_model, :NbSp_place, :NbSp_voyage, :description_SP, :id_ELug)";
        
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_sp' => $Spaceship->get_id_sp(),
                'Sp_model' => $Spaceship->get_Sp_model(),
                'NbSp_place' => $Spaceship->get_NbSp_place(),
                'NbSp_voyage' => $Spaceship->get_NbSp_voyage(),
                'description_SP' => $Spaceship->get_description_SP(),
                'id_ELug' => $Spaceship->get_id_ELug(), // Assuming this method exists
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function update_Spaceship($Spaceship, $id_sp)
    {
        try {
            
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE spaceship SET 
                id_sp = :id_sp, 
                
                Sp_model = :Sp_model,
                NbSp_place = :NbSp_place,
                NbSp_voyage = :NbSp_voyage,
                description_SP = :description_SP
            WHERE id_sp= :id_sp'
            );
            $query->execute([
                'id_sp' => $Spaceship->get_id_sp(),
                
                'Sp_model' => $Spaceship->get_Sp_model(),
                'NbSp_place' => $Spaceship->get_NbSp_place(),
                'NbSp_voyage' => $Spaceship->get_NbSp_voyage(),
                'description_SP' => $Spaceship->get_description_SP(),
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_Spaceship($id_sp)
    {
            // First, delete associated reservations
    $destinationC = new DestinationC();
    $destinations = $destinationC->getDestinationsByspaceship($id_sp);
    foreach ($destinations as $destination) {
        $destinationC->delete_Destination($destination['Destination_id']);
    }

    // Then, delete the destination
    $sql = "DELETE FROM spaceship WHERE id_sp = :id_sp ";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id_sp ', $id_sp );

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
    }


  

    public function recupererSpaceship($id_sp){
        $sql="SELECT * from spaceship where id_sp=$id_sp";
        $conn = new config();
        $db=$conn->getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $Spaceship=$query->fetch();
            return $Spaceship;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
  ?>