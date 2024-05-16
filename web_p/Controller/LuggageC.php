
<?php
require '../config.php';
include '../Model/Luggage.php';

class LuggageC{

    public function show_SpaLug($id_ELug)
    {
        $sql = "SELECT * FROM luggage WHERE id_ELug = :id_ELug";
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

    public function show_Luggage()
    {
        $sql = "SELECT * FROM Luggage";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Luggages = $query->fetchAll(); 
            return $Luggages;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function add_Luggage(Luggage $Luggage)
    {
        $sql = "INSERT INTO Luggage ( id_luggage,type_Lu,weight_Lu) VALUES (:id_luggage,:type_Lu, :weight_Lu)";
    
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_luggage' => $Luggage->get_id_luggage(),
               
                'type_Lu' => $Luggage->get_type_Lu(),
                'weight_Lu' => $Luggage->get_weight_Lu(),

                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

        
    }
    public function update_Luggage($Luggage, $id_luggage)
    {
        try {
            
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Luggage SET 
                id_luggage = :id_luggage, 
                
                type_Lu = :type_Lu,
                weight_Lu = :weight_Lu,

            WHERE id_luggage= :id_luggage'
            );
            $query->execute([
                'id_luggage' => $Luggage->get_id_luggage(),
                
                'type_Lu' => $Luggage->get_type_Lu(),
                'weight_Lu' => $Luggage->get_weight_Lu(),

                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_Luggage($id_luggage)
    {
        $sql = "DELETE FROM Luggage WHERE id_luggage = :id_luggage";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_luggage', $id_luggage);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


  

    public function recupererLuggage($id_luggage){
        $sql="SELECT * from Luggage where id_luggage=$id_luggage";
        $conn = new config();
        $db=$conn->getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $Luggage=$query->fetch();
            return $Luggage;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
  ?>