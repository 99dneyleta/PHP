<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "Bank";

$conn = mysqli_connect($server_name, $username, $password, $db_name);
if (!$conn) {
    die(" conn failed" . mysqli_connect_error());
}
$sql = "INSERT INTO Client (key, name, address, birth_date, gender, credit, phone)
                 VALUES ('1', 'ww', 'asd', '1994-12-19', 'male', '24242423', '65432345')";
if(mysqli_query($conn,$sql)) {
    echo "OK";
} else {
    echo "Err" .$sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);

//echo "Connected successfully";
