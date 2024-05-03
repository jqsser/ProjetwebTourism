<?php
require '../config.php';
include '../models/commentR.php'; 

class commentcr{
    public function show_commentr() {
        $sql = "SELECT * FROM commentr";
        $db = config::getconnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commentsr = $query->fetchAll(PDO::FETCH_ASSOC); 
            return $commentsr;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return []; // Return an empty array in case of error
        }
    } 
    
    public function add_commentr(commentsr $commentsr)
    {
        $sql = "INSERT INTO commentr (content_cr, rating_cr, date_cr) VALUES (:content_cr, :rating_cr, :date_cr)"; // Correction de la requête SQL
    
        $db = config::getconnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'content_cr' => $commentsr->get_content_cr(),
                'rating_cr' => $commentsr->get_rating_cr(), 
                'date_cr' => $commentsr->get_date_cr(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
   
    public function update_commentr($commentsr, $id_cr)
    {
        try {
            $db = config::getconnexion(); // Correction du nom de méthode
            $query = $db->prepare(
                'UPDATE commentr SET 
                content_cr = :content_cr,
                rating_cr = :rating_cr,
                date_cr = :date_cr
                WHERE id_cr = :id_cr' // Correction de la clause WHERE
            );
            $query->execute([
                'id_cr' => $commentsr->get_id_cr(),
                'content_cr' => $commentsr->get_content_cr(),
                'rating_cr' => $commentsr->get_rating_cr(),
                'date_cr' => $commentsr->get_date_cr(),       
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Correction pour afficher le message d'erreur
        }
    } 

    
    public function recupererCommentr($id_cr){
        $sql="SELECT * from commentr where id_cr=$id_cr";
        $conn = new config();
        $db=$conn->getconnexion(); // Correction du nom de méthode
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $commentsr=$query->fetch();
            return $commentsr;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function delete_commentr($id_cr)
    {
        $sql = "DELETE FROM commentr WHERE id_cr = :id_cr";
        $db = config::getconnexion(); // Correction du nom de méthode
        $req = $db->prepare($sql);
        $req->bindValue(':id_cr', $id_cr);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}

?> 