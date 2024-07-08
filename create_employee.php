<?php
$servername = "localhost";
$username = "newuser";
$password = "newpassword";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("חיבור נכשל: " . $conn->connect_error);
}

$employeeID = $_POST['employeeID'];
$name = $_POST['name'];
$position = $_POST['position'];

$sql = "INSERT INTO employees (employeeID, name, position) VALUES ('$employeeID', '$name', '$position')";

if ($conn->query($sql) === TRUE) {
    echo "עובד חדש נוצר בהצלחה";
} else {
    echo "שגיאה ביצירת עובד חדש: " . $conn->error;
}

$conn->close();
?>
