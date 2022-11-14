<?php

session_start();

@include 'config.php';
@include 'func.php';

$result = queryCenter($conn, '');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if ($_GET) {
        $result = queryCenter($conn, $_GET['search']);
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['delete'])) {

        $id = $_POST['center_id'];
        $res = deleteCenter($conn, $id);
        header("Location: admin_home.php");
    }
}

?>





<!DOCTYPE html>
<html>

<head>
    <title>
        Home
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .nav a {
            float: right;
            color: black;
            text-decoration: none;
            padding: 20px;
            font-size: 17px;
        }

        #navlist {
            background-color: #0074D9;
            position: absolute;
            width: 100%;
            text-align: center;
        }

        .search input[type=text] {
            width: 500px;
            height: 25px;
            border-radius: 25px;
            border: none;

        }

        .search {
            float: center;
            margin: 7px;

        }

        .search button {
            background-color: #0074D9;
            color: #f2f2f2;
            float: center;
            padding: 5px 10px;
            margin-right: 16px;
            font-size: 12px;
            border: none;
            cursor: pointer;
        }

        table, th, td {
  border: 1px solid;
}
    </style>
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

    <div id="navlist">
        <div class="search">

            <form  method="GET">
                <input type="text" placeholder=" Search Centers by location " name="search">
                <button>
                    <i class="fa fa-search" style="font-size: 18px;">
                    </i>
                </button>
            </form>
        </div>
    </div>
    <br>

    <br>
    <br>

    <?php
    if ($result && mysqli_num_rows($result) != 0) {



    ?>
        <table style="align-content: center;">
            <tr>
            <th>Center Name</th>
            <th>Center Location</th>
            <th>Phone</th>
            <th></th>
            </tr>

            <?php
            while ($rows = $result->fetch_assoc()) {
            ?>

                <form method="POST">
                    <tr>
                        <td> <?php echo  $rows['name'];  ?></td>
                        <td> <?php echo  $rows['location'] ?> </td>
                        <td> <?php echo  $rows['phone'] ?></td>
                        <input type="hidden" name="center_id" value="<?php echo $rows['centerId'] ?>">
                        <td> <input type="submit" name="delete" value="Delete" /></td>
                    </tr>
                </form>
                </div>
                </div>
            <?php
            }


            ?>
        </table>



    <?php  } else {
    ?>
        <br>
        <br><br>
        <center>
            <h3><?php echo "Sorry !! no center found in your area";
                echo mysqli_num_rows($result); ?><h3>
        </center>
    <?php
    }
    ?>


</body>

</html>