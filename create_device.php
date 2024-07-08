<?php
$servername = "localhost";
$username = "newuser";
$password = "newpassword";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("חיבור נכשל: " . $conn->connect_error);
}

$serialID = $_POST['serialID'];
$type = $_POST['type'];

$sql = "INSERT INTO devices (serialID, type) VALUES ('$serialID', '$type')";

if ($conn->query($sql) === TRUE) {
    echo "נשק חדש נוצר בהצלחה";
} else {
    echo "שגיאה ביצירת נשק חדש: " . $conn->error;
}

$conn->close();
?>
