<html>
<body>

<?php

// function to output a line with the <br> added to the end
function MyPrintLine($String) {
    echo $String . '<br>';
}

?>

<?php

// get the connection object
$conn = new mysqli("localhost", "root", "", "dsvclub");

// Check connection: exits if error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to the MySQL database<br>";

// query the the first name and last name from table players
$result = $conn->query("SELECT firstname,lastname FROM players");

// loop through all records and display each row
while ($row = $result->fetch_assoc()) {
    echo $row['firstname']. ' ' . $row['lastname'] . '<br>';
}

$first_name = $_GET["FName"];
$last_name = $_GET["LName"];
$gender = $_GET["Gender"];
$skill_level = $_GET["SLevel"];
$dob = $_GET["DOB"];
$phone_number = $_GET["PNumber"];
$wechat_id = $_GET["WeChat"];
$tshirt_size = $_GET["T-ShirtS"];
$email = $_GET["E-mail"];

// validate the date of birth
$dateExploded = explode("-", $dob);
if(count($dateExploded) != 3){
    throw new Exception('Invalid Date Format. Please use this format: YYYY-MM-DD');
    exit(1);
}

$day = $dateExploded[2];
$month = $dateExploded[1];
$year = $dateExploded[0];

if(!checkdate($month, $day, $year)){
    $error_message = 'Invalid Date Format. Please use this format: YYYY-MM-DD';
    myPrintLine($error_message);
    exit();
}

$link = mysqli_connect("localhost", "root", "", "dsvclub");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO players (firstname, lastname, gender, skilllevel, dob, email, phonenumber, tshirtsize, wechatid, RegistrationTimeStamp) VALUES ('$first_name', '$last_name', '$gender', '$skill_level', '$dob', '$email', '$phone_number', '$tshirt_size', '$wechat_id', CURRENT_TIMESTAMP)";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);

?>   



<?php
print "Current directory is: " .getcwd(). "<br>";
echo "Hello <br>";
echo "Thank you <br>";
if ($handle = opendir('.')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
        $type = filetype($entry);
        $entry = "$entry " . "($type)";
            MyPrintLine($entry);
        
        }
    }

    closedir($handle);
}
?>  
</body>
</html> 
