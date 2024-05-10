<?php
include '../controller/AsrclientC.php';

$idx = $_POST['idx']; // Retrieve the submitted idx value

if (isset($idx)) {
    $asrclientC = new AsrclientC();
    $assurance = $asrclientC->showassurances($idx); // Fetch assurance details

    if ($assurance) {
        // Assurance details exist, return JSON response
        $response = array(
            'success' => true,
            'html' => "<tr>
                        <th>Type</th>
                        <td>{$assurance['type']}</td>
                      </tr>
                      <tr>
                        <th>Date Start</th>
                        <td>{$assurance['datedebut']}</td>
                      </tr>
                      <tr>
                        <th>Date End</th>
                        <td>{$assurance['datefin']}</td>
                      </tr>
                      <tr>
                        <th>Provider</th>
                        <td>{$assurance['asrprovider']}</td>
                      </tr>
                      <tr>
                        <th>Cost</th>
                        <td>{$assurance['cost']}</td>
                      </tr>"
        );
        
        echo json_encode($response);
    } else {
        // Assurance details don't exist, return JSON response
        $response = array(
            'success' => false,
            'message' => 'Your ID doesn\'t exist'
        );
        echo json_encode($response);
    }
} else {
    echo "No idx value submitted.";
}

?>

