
            <?php
include '../Controller/LuggageC.php';



$d = new LuggageC(NULL,NULL,NULL,NULL,NULL);

    $tab = $d->show_Luggage();


?>



<!DOCTYPE html>
<html>

<head>
    <title> Afficher Luggage</title>
 
</head>

<body>
    
        
            <h1 >Liste des Luggages</h1>
            <br>
            <br>
            <br>
            <br>
            <br>
        

       
        <table >
            <thead>
                <tr>
                    <th>ID Luggage</th>
                    
                    <th>type_Lu</th>
                    <th>flight date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tab as $rec) { ?>
                    <tr>

                        <td><?= $rec['id_luggage'] ?></td>
                        
                        <td><?= $rec['type_Lu'] ?></td>
                        <td><?= $rec['weight_Lu'] ?></td>
                        
                        <td>
                            <form action="updateLuggage.php" method="POST">
                                <input type="hidden" name="id_luggage" value="<?= $rec['id_luggage'] ?>"><button type="submit" class="btn btn-outline-success btn-sm">Modifier</button>
                            </form>
                            <form action="deleteLuggage.php" method="POST">
                                <input type="hidden" name="id_luggage" value="<?= $rec['id_luggage'] ?>"> <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                            </form>
                            
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <form action="addLuggage.php" method="POST">
                                <button type="submit" class="btn btn-outline-success btn-sm">Ajouter</button>
                            </form>
                </br>
                </br>  
                </br>  
                </br>  
                </br>  
                                        </br>            
    
</body>

</html>