<html>
<body>

<?php

$conn = new mysqli("localhost", "root", "", "dsvclub");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";


$result = $conn->query("SELECT firstname,lastname FROM players");
while ($row = $result->fetch_assoc()) {
    echo $row['firstname']. " " . $row['lastname']."<br>";
}

?>

<?php
function MyPrintLine($String) {
  echo "$String <br>";
}

$FName = $_GET["FName"];
$LName = $_GET["LName"];
$Gender = $_GET["Gender"];
$SLevel = $_GET["SLevel"];
$DOB = $_GET["DOB"];
$PNumber = $_GET["PNumber"];
$WeChat = $_GET["WeChat"];
$TShirtS = $_GET["T-ShirtS"];
$Email = $_GET["E-mail"];

echo "Welcome " .$_GET["FName"]. " " .$_GET["LName"]. "<br>";
echo "Gender: " .$_GET["Gender"]. "<br>";
echo "Skill Level: ".$_GET["SLevel"]. "<br>";
echo "Date of Birth: " .$_GET["DOB"]. "<br>";
echo "Phone Number: ".$_GET["PNumber"]. "<br>";
echo "WeChat ID: ".$_GET["WeChat"]. "<br>";
echo "T-Shirt Size: " .$_GET["T-ShirtS"]. "<br>";
echo "Email: " .$_GET["E-mail"]. "<br>";

$dateExploded = explode("-", $DOB);
 
if(count($dateExploded) != 3){
    throw new Exception('Invalid Date Format. Please use this format: YYYY-MM-DD');
    exit();
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

$sql = "INSERT INTO players (firstname, lastname, gender, skilllevel, dob, email, phonenumber, tshirtsize, wechatid, RegistrationTimeStamp) VALUES ('$FName', '$LName', '$Gender', '$SLevel', '$DOB', '$Email', '$PNumber', '$TShirtS', '$WeChat', CURRENT_TIMESTAMP)";
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