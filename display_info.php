<!DOCTYPE html>
<html>
<head>
<style>
table, td {
    border: 1px solid black;
}
th{
    font-size: 20px;
    border: 1px solid black;
    background-color: lightblue;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>
</head>
<body>

    <p style = "font-size:40px;text-align:center"><strong> Applicants </strong></p>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dsvclub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style=\"border:1px solid black;margin-left:auto;margin-right:auto;\"><tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Skill Level</th>
        <th>Date of Birth</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>T-Shirt Size</th>
        <th>WeChat ID</th>
        <th>Registration Timestamp</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" 
        .$row["firstname"]. "</td><td>" 
        .$row["lastname"]. "</td><td>" 
        .$row["gender"]. "</td><td>" 
        .$row["skilllevel"]. "</td><td>" 
        .$row["dob"]. "</td><td>" 
        .$row["email"]. "</td><td>" 
        .$row["phonenumber"]. "</td><td>" 
        .$row["tshirtsize"].  "</td><td>" 
        .$row["wechatid"]. "</td><td>" 
        .$row["RegistrationTimeStamp"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>