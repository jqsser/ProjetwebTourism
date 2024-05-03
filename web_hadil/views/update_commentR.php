<?php
include '../controller/commentRC.php';

if(isset($_POST['id_cr'])) {
    
    $commentcr = new commentcr();
    $rec = $commentcr->recupererCommentr($_POST['id_cr']);
} elseif(isset($_GET['id_cr'])) {
  
    $commentcr = new commentcr();
    $rec = $commentcr->recupererCommentr($_GET['id_cr']);
} else {
 
    header('Location: AddCommentR.php');
    exit(); 
}

$error = "";
$commentsr = null;
$commentcr = new commentcr(); 

if (
    isset($_POST['id_cr']) &&
    isset($_POST['content_cr']) &&
    isset($_POST['rating_cr']) &&
    isset($_POST['date_cr']) 
   
){
    if (
        !empty($_POST["id_cr"]) &&
        !empty($_POST["content_cr"]) &&
        !empty($_POST["rating_cr"]) &&
        !empty($_POST["date_cr"]) 
       
    ) {
        // Créer un objet Reservation avec les données modifiées
        $commentsr = new commentsr(
            $_POST['id_cr'],
            $_POST['content_cr'],
            $_POST['rating_cr'],
            $_POST['date_cr']
        
        );
        // Mettre à jour la réservation dans la base de données
        $commentcr->update_commentr($commentsr, $_POST['id_cr']);
        // Rediriger vers la liste des réservations après la modification
        header('Location: ListCommentR.php');
        exit(); // Terminer le script pour empêcher toute autre exécution
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spacey</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style3.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Ajout d'une couleur de fond pour mieux distinguer la page */
        }

        header {
            position: absolute;
            top: 20px; /* Ajout d'un espacement par rapport au haut de la page */
            left: 50%;
            transform: translateX(-50%);
        }

        form {
            width: 80%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    
       
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <header>
        <h2 class="logo">LOgo</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">Our Team</a>
            <a href="#">News</a>
            <a href="#">Contact</a>
        </nav>
    </header>

       
                            <form method="POST" onsubmit="return verif();">
                               
                                        
                                           <br>
                                                <div >
                                                    <input type="hidden" value="<?php echo $rec['id_cr']?>" name="id_cr" id="id_cr">
                                                    <input type="text" class="form-control p-2" value="<?php echo $rec['id_cr']?>" name="id_cr_display" id="id_cr_display" placeholder="id_cr" disabled>
                                                </div>
                                            </br>
                                            <br>
                                                <div >
                                                    <input type="text" class="form-control p-2" value="<?php echo $rec['content_cr']?>" name="content_cr" id="content_cr" placeholder="content_cr">
                                                </div>
                                                </br>
                                                <br>
                                                <div >
                                                    <input type="text" class="form-control p-2" value="<?php echo $rec['rating_cr']?>" name="rating_cr" id="rating_cr" placeholder="rating_cr">
                                                </div>
                                                </br>
                                                <br>
                                                <div >
                                                <input type="hidden" value="<?php echo $rec['date_cr']?>" name="date_cr" id="date_cr">
                                                <input type="text" class="form-control p-2" value="<?php echo $rec['date_cr']?>" name="date_cr_display" id="date_cr_display" placeholder="date_cr" disabled>
                                                </div>
                                                </br>
                                                
                                                    <br>
                                            <div >
                                                <input class="btn btn-success" type="submit" name="modifier" value="Modifier">
                                            </div>
                                            </br>
                                    
                            </form>
                       
    

</body>

</html>