
            <?php
include '../Controller/SpaceshipC.php';



$d = new SpaceshipC(NULL,NULL,NULL,NULL,NULL);

    $tab = $d->show_Spaceship();


?>



<!DOCTYPE html>
<html>

<head>
    <title> Afficher Spaceship</title>
 
</head>

<body>
    
        
            <h1 >Liste des Spaceships</h1>
            <br>
            <br>
            <br>
            <br>
            <br>
        

       
                                <table >
                                    <thead>
                                        <tr>
                                            <th>ID Spaceship</th>
                                            
                                            <th>Sp_model</th>
                                            <th>flight date</th>
                                            <th>return date</th>
                                            <th>Number of passagers</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tab as $rec) { ?>
                                            <tr>
 
                                                <td><?= $rec['id_sp'] ?></td>
                                                
                                                <td><?= $rec['Sp_model'] ?></td>
                                                <td><?= $rec['NbSp_place'] ?></td>
                                                <td><?= $rec['NbSp_voyage'] ?></td>
                                                <td><?= $rec['description_SP'] ?></td>
                                                
                                                <td>
                                                    <form action="updateSpaceship.php" method="POST">
                                                        <input type="hidden" name="id_sp" value="<?= $rec['id_sp'] ?>"><button type="submit" class="btn btn-outline-success btn-sm">Modifier</button>
                                                    </form>
                                                    <form action="deleteSpaceship.php" method="POST">
                                                        <input type="hidden" name="id_sp" value="<?= $rec['id_sp'] ?>"> <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                        </br>  
                                        </br>  
                                        </br>  
                                        </br>  
                                        </br>            
    
</body>

</html>