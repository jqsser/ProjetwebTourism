<?php
include '../config.php';
include '../model/Asrclient.php';
class AsrclientC{

    public function listassurance()
    {
        $sql = "SELECT * FROM asrclient";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteassurance($id_assur)
    {
        $sql = "DELETE FROM asrclient WHERE id_assur = :id_assur";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_assur', $id_assur);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addassurance($assurance)
    {
        $sql = "INSERT INTO asrclient  
        VALUES (:id_assur, :type_assur,:datedebut, :datefin,:clienthealth,:asrprovider,:cost,:type)";
        $db = config::getConnexion();
        try {
            print_r($assurance->getdatedebut()->format('Y-m-d'));
            print_r($assurance->getdatefin()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'id_assur' => $assurance->getid_assur(),
                'type_assur' => $assurance->gettype_assur(),
                'datedebut' => $assurance->getdatedebut()->format('Y/m/d'),
                'datefin' => $assurance->getdatefin()->format('Y/m/d'),
                'clienthealth' => $assurance->getclienthealth(),
                'asrprovider' => $assurance->getasrprovider(),
                'cost' => $assurance->getcost(),
                'type' => $assurance->gettype()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateassurance($assurance, $id_assur)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE asrclient SET 
                    id_assur = :id_assur, 
                    type_assur = :type_assur, 
                    datedebut = :datedebut, 
                    datefin = :datefin,
                    clienthealth = :clienthealth, 
                    asrprovider = :asrprovider, 
                    cost = :cost, 
                    type = :type
                WHERE id_assur= :id_assur'
            );
            $query->execute([
                'id_assur' => $id_assur,
                'type_assur' => $assurance->gettype_assur(),
                'datedebut' => $assurance->getdatedebut()->format('Y/m/d'),
                'datefin' => $assurance->getdatefin()->format('Y/m/d'),
                'clienthealth' => $assurance->getclienthealth(),
                'asrprovider' => $assurance->getasrprovider(),
                'cost' => $assurance->getcost(),
                'type' => $assurance->gettype()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showassurance($id_assur)
    {
        $sql = "SELECT * from asrclient where id_assur = $id_assur";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $assurance = $query->fetch();
            return $assurance;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function displayAssuranceDetails($id_assur) {
        $assurance = $this->showassurance($id_assur);

        if ($assurance) {
            echo "<table border='1'>";
            echo "<tr><th>idx</th><th>type_assur</th><th>datedebut</th><th>datefin</th><th>asrprovider</th><th>cost</th></tr>";
            echo "<tr>";
            echo "<td>" . $assurance['id_assur'] . "</td>";
            echo "<td>" . $assurance['type_assur'] . "</td>";
            echo "<td>" . $assurance['datedebut'] . "</td>";
            echo "<td>" . $assurance['datefin'] . "</td>";
            echo "<td>" . $assurance['asrprovider'] . "</td>";
            echo "<td>" . $assurance['cost'] . "</td>";
            echo "</tr>";
            echo "</table>";
        } else {
            echo "Your id is incorrect";
        }
    }
}