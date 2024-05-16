
<?php
require 'config.php';
include '../Model/Spaceship.php';

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
        $sql = "DELETE FROM spaceship WHERE id_sp = :id_sp";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_sp', $id_sp);

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