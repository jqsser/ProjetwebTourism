<?php
include '../config.php';
include '../model/Healthstatus.php';
class HealthstatusC{



    public function listhealthstatus()
    {
        $sql = "SELECT * FROM healthstatus";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    


 function deletehealthstatus($id_st)
    {
        $sql = "DELETE FROM healthstatus WHERE id_st = :id_st";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_st', $id_st);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addstatus($healthstatus)
    {
        $sql = "INSERT INTO healthstatus  
        VALUES (:id_st,:age, :gender, :chestpain_type, :resting_bp, :cholesterol, :fastingBS, :normalESG, :maxHR, :exercise, :oldpeak, :ST_slope, :Heart_disease, :health)";
        
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_st' => $healthstatus->getid_st(),
                'age' => $healthstatus->getage(),
                'gender' => $healthstatus->getgender(),
                'chestpain_type' => $healthstatus->getchestpaintype(),
                'resting_bp' => $healthstatus->getrestingbp(),
                'cholesterol' => $healthstatus->getcholesterol(),
                'fastingBS' => $healthstatus->getfastingbs(),
                'normalESG' => $healthstatus->getnormalesg(),
                'maxHR' => $healthstatus->getmaxhr(),
                'exercise' => $healthstatus->getexercise(),
                'oldpeak' => $healthstatus->getoldpeak(),
                'ST_slope' => $healthstatus->getstslope(),
                'Heart_disease' => $healthstatus->getheartdisease(),
                'health' => $healthstatus->gethealth(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } 
    function updatestatus($healthstatus, $id_st)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE healthstatus SET 
                    id_st = :id_st, 
                    age = :age,
                    gender = :gender, 
                    chestpain_type = :chestpain_type, 
                    resting_bp = :resting_bp,
                    cholesterol = :cholesterol, 
                    fastingBS = :fastingBS, 
                    normalESG = :normalESG, 
                    maxHR  = :maxHR,
                    exercise = :exercise,
                    oldpeak = :oldpeak,
                    ST_slope = :ST_slope,
                    Heart_disease = :Heart_disease,
                    health = :health
                
                WHERE id_st= :id_st'
            );
            $query->execute([
                'id_st' => $id_st,
                'age' =>$healthstatus->getage(),
                'gender' => $healthstatus->getgender(),
                'chestpain_type' => $healthstatus->getchestpaintype(),
                'resting_bp' => $healthstatus->getrestingbp(),
                'cholesterol' => $healthstatus->getcholesterol(),
                'fastingBS' => $healthstatus->getfastingbs(),
                'normalESG' => $healthstatus->getnormalesg(),
                'maxHR' => $healthstatus->getmaxhr(),
                'exercise' => $healthstatus->getexercise(),
                'oldpeak' => $healthstatus->getoldpeak(),
                'ST_slope' => $healthstatus->getstslope(),
                'Heart_disease' => $healthstatus->getheartdisease(),
                'health' => $healthstatus->gethealth()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function showstatus()
    {
        $sql = "SELECT * FROM healthstatus";
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
    function recherchestatus($rech)
    {
        $sql = "SELECT * FROM healthstatus WHERE id_st LIKE '%$rech%'";
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
    
    
    
}

?>   