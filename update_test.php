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
$testPeriod = $_POST['testPeriod'];
$result = $_POST['result'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

$sql = "UPDATE devices SET testPeriod='$testPeriod', result='$result', startDate='$startDate', endDate='$endDate' WHERE serialID=$serialID";

if ($conn->query($sql) === TRUE) {
    echo "פרטי הבדיקה עודכנו בהצלחה";
} else {
    echo "שגיאה בעדכון הפרטים: " . $conn->error;
}

$conn->close();
?>
