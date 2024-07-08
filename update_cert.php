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
$certName = $_POST['certName'];
$certPeriod = $_POST['certPeriod'];
$certGrade = $_POST['certGrade'];
$certStartDate = $_POST['certStartDate'];
$certEndDate = $_POST['certEndDate'];

$sql = "UPDATE employees SET certName='$certName', certPeriod='$certPeriod', certGrade='$certGrade', certStartDate='$certStartDate', certEndDate='$certEndDate' WHERE employeeID=$employeeID";

if ($conn->query($sql) === TRUE) {
    echo "פרטי ההסמכה עודכנו בהצלחה";
} else {
    echo "שגיאה בעדכון הפרטים: " . $conn->error;
}

$conn->close();
?>
