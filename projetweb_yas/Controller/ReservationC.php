<?php
require '../config.php';
include '../Model/Reservation.php';

class ReservationC{

    public function show_reservation()
    {
        $sql = "SELECT * FROM reservation";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reservations = $query->fetchAll(); 
            return $reservations;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function add_reservation(Reservation $Reservation)
    {
        $sql = "INSERT INTO reservation (departure,flightdate,returndate,nb_passengers) VALUES (:departure, :flightdate,:returndate, :nb_passengers)";
    
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                
               
                'departure' => $Reservation->get_departure(),
                'flightdate' => $Reservation->get_flightdate(),
                'returndate' => $Reservation->get_returndate(),
                'nb_passengers' => $Reservation->get_nb_passengers(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

        
    }
    public function update_reservation($reservation, $id_reserv)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservation SET 
                id_reserv = :id_reserv, 
                
                departure = :departure,
                flightdate = :flightdate,
                returndate = :returndate,
                nb_passengers = :nb_passengers
            WHERE id_reserv= :id_reserv'
            );
            $query->execute([
                'id_reserv' => $reservation->get_id_reserv(),
                
                'departure' => $reservation->get_departure(),
                'flightdate' => $reservation->get_flightdate(),
                'returndate' => $reservation->get_returndate(),
                'nb_passengers' => $reservation->get_nb_passengers(),
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_reservation($id_reserv)
    {
        $sql = "DELETE FROM reservation WHERE id_reserv = :id_reserv";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_reserv', $id_reserv);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


  

    public function recupererReservation($id_reserv){
        $sql="SELECT * from reservation where id_reserv=$id_reserv";
        $conn = new config();
        $db=$conn->getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $Reservation=$query->fetch();
            return $Reservation;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
  ?>