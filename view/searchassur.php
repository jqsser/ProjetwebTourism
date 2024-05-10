<?php
include '../controller/AsrclientC.php';

// Check if the ID is provided
if(isset($_GET['search_id'])) {
    $asrclient = new AsrclientC();
    $id_assur = $_GET['search_id']; // Get the search ID from the URL parameter
    $assurance = $asrclient->searchAssuranceById($id_assur);

    if ($assurance) {
        // Return the assurance details as JSON
        echo json_encode($assurance);
    } else {
        // If assurance not found, return an empty object
        echo json_encode((object)[]);
    }
} else {
    echo "Please provide an ID to search for assurance";
}
?>
