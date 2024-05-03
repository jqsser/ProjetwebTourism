<?php
include '../controller/commentC.php';



$d = new commentC(NULL,NULL,NULL,NULL);

    $tab = $d->show_comment();


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
            background-color: #f2f2f2;
        }

        header {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        table {
            width: 80%;
            max-width: 800px;
            margin-top: 120px; /* Ajustement pour compenser la hauteur du header */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            width: 80%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
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
        .comment-table {
            max-height: 500px; /* Limite la hauteur de la table */
            overflow-y: auto; /* Ajoute une barre de défilement vertical si nécessaire */
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
    

    <table class="comment-table">
        <thead>
            <tr>
                <th>ID comment</th>
                <th>Content</th>
                <th>Date</th>
                <th>Rating </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab as $rec) { ?>
                <tr>
                    <td><?= $rec['id_c'] ?></td>
                    <td><?= $rec['content_c'] ?></td>
                    <td><?= date('d/m/Y', strtotime($rec['date_c'])) ?></td>
                    <td><?= $rec['rating_c'] ?></td>
                    <td>
                        <form action="UpdateComment.php" method="POST">
                            <input type="hidden" name="id_c" value="<?= $rec['id_c'] ?>"><button type="submit" class="btn btn-outline-success btn-sm">Modifier</button>
                        </form>
                        <form action="DeleteComment.php" method="POST">
                            <input type="hidden" name="id_c" value="<?= $rec['id_c'] ?>"> <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>

</html>
