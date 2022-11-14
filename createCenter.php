<?php

@include 'config.php';
@include 'func.php';

if (isset($_POST['submit'])) {

    $res= addCenter($conn,$_POST['name'],$_POST['location'],$_POST['phone']);
    if($res)
    {
        echo "
        <script>
            alert('successful');
        </script> ";
    }
    else{

            echo $res ;

    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Center</title>
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>

<body>
<div class="nav">
    <a href="admin_home.php">Home</a>
    <a href="getDosage.php">Dosage Details</a>
    <a href="createCenter.php">Add Center</a>
    <a href="logout.php">Logout</a>

    </div><br>
    <br>
    <br>
    <br>

    <div class="form-container">

        <form action="" method="post">
            <h3> Create Center</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="Enter center Name">
            <input type="text" name="location" required placeholder="Enter Center Location">
            <input type="number" name="phone" required placeholder="Enter Center phone">
            <input type="submit" name="submit" value="Add" class="form-btn">
        </form>

    </div>

</body>

</html>