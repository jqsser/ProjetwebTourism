<?php
    include_once '../Controller/SpaceshipC.php';
    include_once '../Model/Spaceship.php';



    $error = "";
    
    $Spaceship = null;
    
    $SpaceshipC = new SpaceshipC();
    if (
        isset($_POST['id_sp']) &&
        
        isset($_POST['Sp_model']) &&
        isset($_POST['NbSp_place']) &&
        isset($_POST['NbSp_voyage']) &&
        isset($_POST['description_SP'])
    ){
        if (
            !empty($_POST["id_sp"]) &&
           
            !empty($_POST["Sp_model"]) &&
            !empty($_POST["NbSp_place"]) &&
            !empty($_POST["NbSp_voyage"]) &&
            !empty($_POST["description_SP"]) 
        ) {
            $Spaceship = new Spaceship(
                $_POST['id_sp'],
               
                $_POST['Sp_model'] ,
                $_POST['NbSp_place'] ,
                $_POST['NbSp_voyage'] ,

               $_POST['description_SP'] 
            );
			$SpaceshipC->add_Spaceship($Spaceship);
           
        }
        else
            $error = "Missing information";
   }

   if(isset($_POST['ajouter']))
	{
    	header ('Location:ListeSpaceship.php');
	}

?>



<!DOCTYPE html>
<html>

<head>
    <title> Ajouter Spaceship</title>
    <script>
        function validateForm() {
    var id_sp = document.getElementById("id_sp").value;
    var Sp_model = document.getElementById("Sp_model").value;
    var NbSp_place = document.getElementById("NbSp_place").value;
    var NbSp_voyage = document.getElementById("NbSp_voyage").value;
    var description_SP = document.getElementById("description_SP").value;

    // Check if any field is empty
    if (id_sp == "" || Sp_model == "" || NbSp_place == "" || NbSp_voyage == "" || description_SP == "") {
        alert("All fields are required");
        return false;
    }
    Sp_model 
    NbSp_place 
    NbSp_voyage 
    description_SP 

    // Check if number of passengers is numeric
    if (!isNaN(description_SP)) 
    {
        alert("description_SP must be a string");
        return false;
    }

    if (isNaN(NbSp_place)) 
    {
        alert("Number of place must be numeric");
        return false;
    }
    if (isNaN(NbSp_voyage)) 
    {
        alert("Number of voyage must be numeric");
        return false;
    }

    // Check if Sp_model is a string
    if (!isNaN(Sp_model)) 
    {
            alert("Sp_model must be a string");
            return false;
    }
    }


    </script>
</head>

<body>

<h1>Ajouter Spaceship</h1>
<br>
      

      
                                            <form method="POST" onsubmit="return validateForm();">
                                                     <br>
                                                    <div>
                                                        <input type="int" class="form-control p-2" name="id_sp" id="id_sp" placeholder="id_sp">
                                                    </div>
                                                    </br>
                                                    <br>
                                                    <div >
                                                        <input type="text" class="form-control p-2" name="Sp_model" id="Sp_model" placeholder="Sp_model">
                                                    </div>
                                                    </br>
                                                    <br>
                                                    <div >
                                                        <input type="int" class="form-control p-2" name="NbSp_place" id="NbSp_place" placeholder="NbSp_place">
                                                    </div>
                                                    </br>
                                                    <br>
                                                    <div >
                                                        <input type="int" class="form-control p-2" name="NbSp_voyage" id="NbSp_voyage" placeholder="NbSp_voyage">
                                                    </div>
                                                    </br>
                                                    <br>
                                                    <div >
                                                        <input type="text" class="form-control p-2" name="description_SP" id="description_SP" placeholder="description_SP" maxlength="200">
                                                    </div>
                                                    </br>
                                                <br>
                                                
                                                <div >
                                                    <input class="btn btn-success" type="submit" name="ajouter" value="Ajouter">
                                                </div>
                                               </br>
                                            </form>
                                      
</br>
    
</body>

</html>
