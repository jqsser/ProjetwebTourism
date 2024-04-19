<?php
include '../Controller/ReservationC.php';

$d = new ReservationC(NULL,NULL,NULL,NULL,NULL);
$tab = $d->show_reservation();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Ajoutez vos styles CSS personnalisés ici */
    body {
        background-color: #f0f0f0;
        color: #333;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    th:first-child,
    th:nth-child(2),
    th:nth-child(3),
    th:nth-child(4),
    th:nth-child(5),
    th:nth-child(6) {
        background-color: #2c3e50;
        color: #fff;
    }

    th:nth-child(n+7) {
        background-color: #004080;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .btn {
        padding: 5px 10px;
        margin: 2px;
    }

    .action-btns {
        text-align: center;
        margin-top: 20px;
    }

    .action-btns form {
        display: inline;
    }
</style>
    
</head>

<body>
    <div class="container">
        <h1 class="text-center">Booking List</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Reservation</th>
                    <th>Departure</th>
                    <th>Flight Date</th>
                    <th>Return Date</th>
                    <th>Number of Passengers</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tab as $rec) { ?>
                    <tr>
                        <td><?= $rec['id_reserv'] ?></td>
                        <td><?= $rec['departure'] ?></td>
                        <td><?= $rec['flightdate'] ?></td>
                        <td><?= $rec['returndate'] ?></td>
                        <td><?= $rec['nb_passengers'] ?></td>
                        <td>
                       
                            <form action="deleteAdmin.php" method="POST">
                                <input type="hidden" name="id_reserv" value="<?= $rec['id_reserv'] ?>">
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>