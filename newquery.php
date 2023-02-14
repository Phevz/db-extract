<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Connect to Database

$servername = "localhost";
$username = "root";
$password = "root";
$db_name = "authsystem";

$mysqli = new mysqli($servername, $username, $password, $db_name);

//Check if connection is successful

if($mysqli->connect_error){
    die("Connection Failed: " . $mysqli->connect_error);
}

//SQL Query
$database = "SELECT * FROM user AS u INNER JOIN account AS a ON u.username = a.username";

$data = $mysqli->prepare($database);

$result = $mysqli->query($database);

$rows = $result->num_rows;

if($result->num_rows > 0){
    while($rows = $result->fetch_assoc()){
        // $users[] = $row;
        print_r($rows['id']);
        echo "<br>";
        print_r($rows['username']); 
        echo "<br>";
        print_r($rows['acno']); 
        echo "<br>";
        print_r($rows['bankname']); 
        echo "<br>";
    }
    // foreach($users as $user){
    //     print_r($rows['id']);
    //     print_r($rows['username']);
    //     echo $rows['phone'];
    // }
}

else {
    echo $rows;
}

$mysqli->close();


?>