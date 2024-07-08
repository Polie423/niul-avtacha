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

$sql = "DELETE FROM devices WHERE serialID=$serialID";

if ($conn->query($sql) === TRUE) {
    echo "הנשק הוסר בהצלחה";
} else {
    echo "שגיאה בהסרת הנשק: " . $conn->error;
}

$conn->close();
?>
