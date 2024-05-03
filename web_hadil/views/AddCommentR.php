<?php
include_once '../controller/commentCR.php';
include_once '../models/commentR.php';

$error = "";
$commentsr = null;

$commentcr = new commentcr();
if (
    isset($_POST['content_cr']) &&
    isset($_POST['rating_cr'])
){
    if (
        !empty($_POST["content_cr"]) &&
        !empty($_POST["rating_cr"])
    ) {
        $currentDate = date('Y-m-d');
        $currentYear = date('Y', strtotime($currentDate));
        $currentMonth = date('m', strtotime($currentDate));
        $currentDay = date('d', strtotime($currentDate));

        $commentsr = new commentsr(
            $_POST['content_cr'],
            $_POST['rating_cr'],
            $currentYear . '-' . $currentMonth . '-' . $currentDay 
        );
        $commentcr->add_commentr($commentsr);
    } else {
        $error = "Missing information";
    }
}

// Redirection vers ListCommentR.php si la clé 'ajouter' existe dans $_POST
if(isset($_POST['Ajouter'])) {
    header('Location: ListCommentR.php');
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
        <input type="hidden" name="id_cr" value="">
        <div>
            <input type="text" class="form-control p-2" name="content_cr" id="content_cr" placeholder="Contenu">
        </div>
        <div>
            <input type="text" class="form-control p-2" name="rating_cr" id="rating_cr" placeholder="Note">
        </div>
        <div>
            <input class="btn btn-success" type="submit" name="Ajouter" value="Ajouter">
        </div>
    </form>

</body>
</html>