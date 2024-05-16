<?php
  include '../../Controller/SpaceshipC.php';
  include '../../View/addSpaceship.php';

  $d = new SpaceshipC(NULL,NULL,NULL,NULL,NULL);

  $tab = $d->show_Spaceship();
  ?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td:last-child {
            text-align: center;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-blue {
            background-color: #3498db;
            color: #fff;
        }
        .btn-blue:hover {
            background-color: #2980b9;
        }
        .btn-delete {
            background-color: #ccc;
            color: #fff;
        }
        .btn-delete:hover {
            background-color: #999;
        }
        a {
            text-decoration: none;
            color: #000;
        }
        a:hover {
            text-decoration: underline;
        }
        .center {
            text-align: center;
        }
        .move-right {
            float: right;
        }
        .move-left-top {
            position: absolute;
            margin-top: -15px;
            margin-left: -10px;
        }
        .page-title {
            font-size: 36px;
            text-align: center;
            margin-top: -20px;
        }
       
        </style>
     

</head>
<body>
    <div class="container">
       
        <div class="center">
            <h1 class="page-title">List of Spaceships</h1>
        </div>
        <table border="1" align="center" width="70%">
            <head>
                <tr>
                    <th>ID Spaceship</th> 
                    <th>Model</th>
                    <th>Places</th>
                    <th>Voyages</th>
                    <th>Description</th>
                  
                </tr>
            </head>
            <body>
            <?php foreach ($tab as $rec) 
             { ?>
                  <tr>
                    <td><?= $rec['id_sp'] ?></td>
                    <td><?= $rec['Sp_model'] ?></td>
                    <td><?= $rec['NbSp_place'] ?></td>
                    <td><?= $rec['NbSp_voyage'] ?></td>
                    <td><?= $rec['description_SP'] ?></td>
                    <td><?= $rec['id_luggage'] ?></td>
                    <td><?= $rec['type_Lu'] ?></td>
                    
                </tr>
                <?php } ?>
            </body>
        </able>
    </div>

   
    </form>
                        
               
</body>

</html>


    <section>
    
    <script src="../../View/scriptdash.js"></script>
    <footer 
      class="page-footer">
    </footer>