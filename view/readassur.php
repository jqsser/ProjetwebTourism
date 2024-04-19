<?php
include '../controller/AsrclientC.php';
$assuranceC = new AsrclientC();
$list = $assuranceC->listassurance();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of assurances</h1>
        <h2>
            <a href="createassur.php">Add assurance</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id assurance</th>
            <th>type d'assurance</th>
            <th>date debut</th>
            <th>date fin</th>
            <th>client health</th>
            <th>assurance provider</th>
            <th>cost</th>
            <th>type</th>
        </tr>
        <?php
        foreach ($list as $assurance) {
        ?>
            <tr>
                <td><?= $assurance['id_assur']; ?></td>
                <td><?= $assurance['type_assur']; ?></td>
                <td><?= $assurance['datedebut']; ?></td>
                <td><?= $assurance['datefin']; ?></td>
                <td><?= $assurance['clienthealth']; ?></td>
                <td><?= $assurance['asrprovider']; ?></td>
                <td><?= $assurance['cost']; ?></td>
                <td><?= $assurance['type']; ?></td>
                <td align="center">
                <form method="POST" action="updateassur.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $assurance['id_assur']; ?> name="id_assur">
                    </form>
                </td>
                <td>
                    <a href="deleteassur.php? id_assur=<?php echo $assurance['id_assur']; ?>">Delete</a>
                </td>
            </tr>
                   
        <?php
        }
        ?>
    </table>
</body>

</html>