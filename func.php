<?php
function queryCenter($conn, $name)
{


        $query = " SELECT * FROM center where location like '%$name%' ";

        $result = mysqli_query($conn, $query);
        return $result;
}

function check($conn)
{
    $date = date('Y-m-d');
    $query = "select * from dosage where date='$date'";
    $res = mysqli_query($conn, $query);
    return $res;
}


function createDosage($conn, $center_id)
{
    $date = date('Y-m-d');

        $id =getmyuid();
        $query = "INSERT INTO dosage (dosageId, userId, centerId,date) VALUES ('','$id','$center_id','$date') ";
        $result = mysqli_query($conn, $query);
        return $result;

}

function deleteCenter($con,$center_id)
{
	$query="delete from center where centerId= $center_id";
	$result=mysqli_query($con,$query);
		return $result;
}

function addCenter($con,$name,$loc,$phone)
{
	$query="INSERT INTO center (centerId, name, location, phone) VALUES ('','$name','$loc','$phone')";
	$result=mysqli_query($con,$query);
	return $result;
}
function getDosageDetails($con)
{
	$query ="select * from dosage order by centerId";
	$result=mysqli_query($con,$query);
	return $result;
}
