<?php

session_start();

@include 'config.php';
@include 'func.php';

$result = getDosageDetails($conn);
?>

<!DOCTYPE HTML>
<html lang="en">
<html>

<head>
    <style>
        .nav a {
            float: right;
            color: black;
            text-decoration: none;
            padding: 20px;
            font-size: 17px;
        }

        table, th, td {
  border: 1px solid;
  text-align: center;
}

table
{
align-items: center;
width: 100%;
}
    </style>

    <title>Dosage Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="nav">
        <a href="logout.php">Logout</a>
        <a href="createCenter.php">Add Center</a>
        <a href="getDosage.php">Dosage Details</a>
        <a href="admin_home.php">Home</a>

    </div><br>
    <br>
    <br>
    <br>

    <table>

    <?php
    $curr = "";


    if ($result && mysqli_num_rows($result) != 0) {
        while ($rows = $result->fetch_assoc()) {
    ?>


            <div>
                <h4><b><?php
                        if ($rows['centerId'] != $curr) {
                            echo " <tr> " ;
                            echo "<td>";
                            echo "Center Id : ";
                            echo  $rows['centerId'];
                            echo "</td></tr>";
                            $curr = $rows['centerId'];
                            echo "<tr> <th>Dosage ID </th> <th> User ID  </th> <th> Date </th> </tr>";
                        }
                        ?> </b></h4>
                <p><?php


                        echo " <tr> " ;
                        echo "<td>";
                        echo $rows['dosageId'];
                        echo "</td>";

                        echo "<td>";
                        echo $rows['userId'];
                        echo "</td>";

                        echo "<td>";
                        echo $rows['date'];
                        echo "</td>";

                        echo " </tr>";
                       ?>
            </div>

    <?php
        }
    }
    ?>

</table>

</body>

</html>