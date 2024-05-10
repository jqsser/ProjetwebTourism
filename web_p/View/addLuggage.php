<?php
    include_once '../Controller/LuggageC.php';
    include_once '../Model/Luggage.php';



    $error = "";
    
    $Luggage = null;
    
    $LuggageC = new LuggageC();
    if (
        isset($_POST['id_luggage']) &&
        
        isset($_POST['type_Lu']) &&
        isset($_POST['weight_Lu']) 
    ){
        if (
            !empty($_POST["id_luggage"]) &&
           
            !empty($_POST["type_Lu"]) &&
            !empty($_POST["weight_Lu"])
        ) {
            $Luggage = new Luggage(
                null,
               
                $_POST['type_Lu'] ,
                $_POST['weight_Lu'] 
            );
			$LuggageC->add_Luggage($Luggage);
           
        }
        else
            $error = "Missing information";
   }

   if(isset($_POST['ajouter']))
	{
    	header ('Location:ListeLuggage.php');
	}

?>



<!DOCTYPE html>
<html>

<head>
    <title> Ajouter Luggage</title>
    <script>
        function validateForm() {
    var id_luggage = document.getElementById("id_luggage").value;
    var type_Lu = document.getElementById("type_Lu").value;
    var weight_Lu = document.getElementById("weight_Lu").value;

    // Check if any field is empty
    if ( type_Lu == "" || weight_Lu == "" ) {
        alert("All fields are required");
        return false;
    }
  

    // Check if number of passengers is numeric
 

    if (isNaN(weight_Lu)) 
    {
        alert("Number of place must be numeric");
        return false;
    }
  

    // Check if type_Lu is a string
    if (!isNaN(type_Lu)) 
    {
            alert("type_Lu must be a string");
            return false;
    }
    }


    </script>
</head>

<body>

<h1>Ajouter Luggage</h1>
<br>
      

      
    <form method="POST" onsubmit="return validateForm();">
                <br>
            <div>
                <input type="int" class="form-control p-2" name="id_luggage" id="id_luggage" placeholder="id_luggage">
            </div>
            </br>
            <br>
            <div >
                <input type="text" class="form-control p-2" name="type_Lu" id="type_Lu" placeholder="type_Lu">
            </div>
            </br>
            <br>
            <div >
                <input type="int" class="form-control p-2" name="weight_Lu" id="weight_Lu" placeholder="weight_Lu">
            </div>
            </br>
            <div >
                <input class="btn btn-success" type="submit" name="ajouter" value="Ajouter">
            </div>
            
    </form>
                                      
</br>
    
</body>

</html>
