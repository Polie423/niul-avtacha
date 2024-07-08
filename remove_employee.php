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

$sql = "DELETE FROM employees WHERE employeeID=$employeeID";

if ($conn->query($sql) === TRUE) {
    echo "העובד הוסר בהצלחה";
} else {
    echo "שגיאה בהסרת העובד: " . $conn->error;
}

$conn->close();
?>
