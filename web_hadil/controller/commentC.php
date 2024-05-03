<?php
require '../config.php';
include '../models/comment.php'; 

class commentc{
    public function show_comment()
    {
        $sql = "SELEcT * FROM comment";
        $db = config::getconnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $comments = $query->fetchAll(PDO::FETCH_ASSOC); 
            return $comments;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    } 
    
    public function add_comment(comments $comments)
    {
        $sql = "INSERT INTO comment ( id_c, content_c, date_c, rating_c) VALUES (:id_c,:content_c,:rating_c, :date_c)";
    
        $db = config::getconnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_c' => $comments->get_id_c(),
                'content_c' => $comments->get_content_c(),
                'rating_c' => $comments->get_rating_c(), 
                'date_c' => $comments->get_date_c(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

        
    }
   
    public function update_comment($comments, $id_c)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE comment SET 
                id_c = :id_c, 
                content_c = :content_c,
                rating_c = :rating_c,
                date_c = :date_c
             
            WHERE id_c= :id_c'
            );
            $query->execute([
                'id_c' => $comments->get_id_c(),
                'content_c' => $comments->get_content_c(),
                'rating_c' => $comments->get_rating_c(),
                'date_c' => $comments->get_date_c(),
               
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    } 

    
    public function recupererComment($id_c){
        $sql="SELECT * from comment where id_c=$id_c";
        $conn = new config();
        $db=$conn->getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $comments=$query->fetch();
            return $comments;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function delete_comment($id_c)
    {
        $sql = "DELETE FROM comment WHERE id_c = :id_c";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_c', $id_c);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

}
?>