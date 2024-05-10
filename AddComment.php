<?php
include_once '../controller/commentRC.php';



$error = "";
$comments = null;
$commentc = new commentc();



// Traitement de l'ajout d'un commentaire
if (isset($_POST['content_c']) && isset($_POST['rating_c'])) {
    if (!empty($_POST["content_c"]) && !empty($_POST["rating_c"])) {
        $currentDate = date('Y-m-d');
        $currentYear = date('Y', strtotime($currentDate));
        $currentMonth = date('m', strtotime($currentDate));
        $currentDay = date('d', strtotime($currentDate));

        $comments = new comments(
            NULL,
            $_POST['content_c'],
            $_POST['rating_c'],
            $currentYear . '-' . $currentMonth . '-' . $currentDay
        );
        $commentc->add_comment($comments);
    } else {
        $error = "Missing information";
    }
}
//traitment de la suprrision
if (isset($_POST["id_c"])) {
    $relatedRows = $commentc->count_related_rows($_POST["id_c"]);

    if ($relatedRows == 0) {
        // No related rows found, safe to delete the comment
        $commentc->delete_comment($_POST["id_c"]);
    } else {
        // There are related rows, display an error message or handle accordingly
        $error = "Cannot delete comment because related entries exist.";
    }
}

// Fonction pour générer les étoiles en fonction du rating
function generateStars($rating) {
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $stars .= '&#9733;'; // Étoile pleine
        } else {
            $stars .= '&#9734;'; // Étoile vide
        }
    }
    return $stars;
}

// Récupération de la liste des commentaires
$tab = $commentc->show_comment(); 


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <style> 
     body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 600vh;
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
        .comment-container {
            width: 80%;
            margin: 0 auto;
            margin-top: 20px;
        }

        .comment-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .comment-user {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .comment-content {
            margin-bottom: 10px;
        }

        .comment-details {
            font-size: 0.8em;
            color: #666;
            margin-bottom: 5px;
        }

        .comment-actions {
            display: flex;
            align-items: center;
        }

        .comment-actions button {
            margin-right: 5px;
        }

        .reply-form {
            margin-top: 10px;
        }
        /* Basic styling for the form and popup */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black */
            display: none;
        }
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: none;
            z-index: 1000; /* Ensure the popup is on top */
            width: 80%; /* Set width to 80% of the viewport */
            max-width: 600px; /* Set maximum width to prevent overly wide popups */
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px; /* Increased margin for better spacing */
            display: block;
            font-size: 18px; /* Increased font size */
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box; /* Include padding and border in the width */
        }
        textarea {
            resize: vertical; /* Allow vertical resizing */
            min-height: 100px; /* Set a minimum height for the textarea */
        }
        .btn {
            background-color: #007bff; /* Blue color */
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        
       
        
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px; /* Increased margin for better spacing */
            display: block;
            font-size: 18px; /* Increased font size */
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box; /* Include padding and border in the width */
        }
        textarea {
            resize: vertical; /* Allow vertical resizing */
            min-height: 100px; /* Set a minimum height for the textarea */
        }
        .btn {
            background-color: #007bff; /* Blue color */
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        } 
        /* CSS pour les étoiles */
      .star {
       cursor: pointer; /* Curseur de type pointeur pour indiquer que les étoiles sont cliquables */
      }

     .star.yellow {
    color: yellow; /* Couleur jaune pour les étoiles au survol */
      }
       
    </style>
</head>
<body>
    <header>
        <h2 class="logo">LOgo</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">Our Team</a>
            <a href="#">News</a>
            <a href="#">Contact</a>
        </nav>
    </header>
    <div class="container">
        <!-- Formulaire pour ajouter un commentaire -->
        <form method="POST" onsubmit="return verif();">
            <input type="hidden" name="id_c" value="<?php echo isset($_GET['id_c']) ? $_GET['id_c'] : ''; ?>"> <!-- Champ caché pour l'ID du commentaire parent -->
            <div>
                <input type="text" class="form-control p-2" name="content_c" id="content_c" placeholder="Contenu">
            </div>
            <div>
    <!-- Champ caché pour stocker la valeur du rating -->
    <input type="hidden" name="rating_c" id="rating_c" value="1"> 
    <!-- Groupe d'étoiles pour l'ajout du rating -->
    <div class="rating-stars">
        <?php 
        // Boucle pour générer les étoiles
        for ($i = 1; $i <= 5; $i++) {
            echo '<span class="star" data-value="' . $i . '" onclick="setRating(' . $i . ')">&#9733;</span>'; // Utilisation de l'entité HTML pour une étoile pleine
        }
        ?>
    </div>
</div>

            <div>
                <input class="btn btn-success" type="submit" name="Ajouter" value="Ajouter">
            </div>
        </form>


    <div class="comment-container">
        <div class="comment-table">
            <div class="comment-table-body">
                <?php foreach ($tab as $rec) { ?>
                    <div class="comment-box">
                        <div class="comment-user"><?= $rec['id_c'] ?></div>
                        <div class="comment-content"><?= $rec['content_c'] ?></div>
                        <div class="comment-details">
                           
                             <!-- Utilisation de la fonction generateStars pour afficher le rating sous forme d'étoiles -->
                              <!-- Affichage des étoiles basé sur le rating -->
                             <div class="rating-stars"><?= generateStars($rec['rating_c']) ?></div>
                             </div> 
                        <span class="comment-date"><?= date('d/m/Y', strtotime($rec['date_c'])) ?></span>



                        <div class="comment-actions">
                        <button class="btn btn-blue" onclick="PopupUpdateSPForm('<?= $rec['id_c'] ?>', '<?= $rec['content_c'] ?>', '<?= $rec['rating_c'] ?>','<?= $rec['date_c'] ?>')">Update</button>
                            <button class="btn btn-outline-primary btn-sm" onclick="toggleReplyForm(<?= $rec['id_c'] ?>)">
                                <i class="fas fa-reply"></i> <!-- Reply icon -->
                            </button>

                            <!-- Formulaire pour supprimer un commentaire -->
                            <form action="" method="POST">
                                <input type="hidden" name="id_c" value="<?= $rec['id_c'] ?>">
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
                                </button>
                            </form> 
                        </div>

                        <!-- Formulaire pour répondre à un commentaire -->
                        <div id="reply-form-<?= $rec['id_c'] ?>" class="reply-form" style="display: none;">
                            <form action="AddCommentR.php" method="POST">
                                <input type="hidden" name="id_parent" value="<?= $rec['id_c'] ?>">
                                <div>
                                    <input type="text" class="form-control p-2" name="content_cr" placeholder="Contenu">
                                </div>
                                <div>
                                    <input type="text" class="form-control p-2" name="rating_cr" placeholder="Note">
                                </div>
                                <div>
                                    <input class="btn btn-success" type="submit" name="Ajouter" value="Ajouter">
                                </div>
                            </form>
                        </div>
                        
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="popup" id="updateSPPopup">
    <span class="close-btn" onclick="toggleUpdateSPPopup()">&times;</span>
    <h2>Update Your Comment!</h2>
    <form action="UpdateComment.php" method="POST" onsubmit="return validateFormSpaceship()">
        <div class="form-group">
            <input type="hidden" id="id_c" name="id_c" value="">
            <div>
                <input type="text" id="content_c" name="content_c" placeholder="Contenu">
            </div>
            <div>
                <input type="text" id="rating_c" name="rating_c" placeholder="Rating">
            </div> 
            <input type="hidden" id="date_c" name="date_c" value="">
            <!-- Ajoutez d'autres champs de formulaire ici -->
            <input type="submit" name="modifier" value="Modifier">
        </div>
    </form>
</div>
 
     <!-- Afficher reply  -->
    
     
<script>
    function toggleUpdateSPPopup() {
        var popup = document.getElementById("updateSPPopup");
        popup.style.display = popup.style.display === "none" ? "block" : "none";
    }

    function PopupUpdateSPForm(id_c, content_c, rating_c, date_c) {
        document.getElementById("id_c").value = id_c;
        document.getElementById("content_c").value = content_c;
        document.getElementById("rating_c").value = rating_c;
        document.getElementById("date_c").value = date_c;
       
        toggleUpdateSPPopup(); // Show
    } 
     // Fonction pour afficher ou masquer le conteneur de réponse
     function toggleReplyForm(commentId) {
            var replyForm = document.getElementById('reply-form-' + commentId);
            if (replyForm.style.display === 'none' || replyForm.style.display === '') {
                replyForm.style.display = 'block';
            } else {
                replyForm.style.display = 'none';
            }
        }  
        // Fonction pour gérer les événements de survol et de clic sur les étoiles
    function handleStarEvents(starIndex) {
        // Récupère toutes les étoiles
        var stars = document.querySelectorAll('.star');
        
        // Parcours toutes les étoiles
        for (var i = 0; i < stars.length; i++) {
            // Si l'indice de l'étoile est inférieur ou égal à starIndex, l'étoile devient jaune au survol
            if (i <= starIndex) {
                stars[i].classList.add('yellow');
            } else {
                stars[i].classList.remove('yellow');
            }
        }
        
        // Gestionnaire d'événements clic pour enregistrer la valeur du rating dans la base de données
        for (var i = 0; i < stars.length; i++) {
            stars[i].addEventListener('click', function() {
                var rating = this.dataset.value; // Récupère la valeur du rating de l'étoile
                // Vous pouvez envoyer la valeur du rating à la base de données ici
                console.log('Rating:', rating); // Exemple : Affiche la valeur du rating dans la console
            });
        }
    } 
    function setRating(value) {
        var stars = document.querySelectorAll('.star');

        // Parcours toutes les étoiles
        for (var i = 0; i < stars.length; i++) {
            // Si l'indice de l'étoile est inférieur ou égal à la valeur sélectionnée, la couleur de l'étoile est jaune
            if (i < value) {
                stars[i].classList.add('yellow');
            } else {
                stars[i].classList.remove('yellow');
            }
        }

        // Met à jour la valeur du rating dans le champ caché
        document.getElementById('rating_c').value = value;
    }
</script> 
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/2eb6ccae-13da-4556-b868-01497371d486/webchat/config.js" defer></script>
   
</body>
</html>
