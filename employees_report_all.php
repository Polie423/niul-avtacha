<?php
$servername = "localhost";
$username = "newuser";
$password = "newpassword";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("חיבור נכשל: " . $conn->connect_error);
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

echo "<!DOCTYPE html>
<html dir='rtl'>
<head>
    <meta charset='UTF-8'>
    <title>דו״ח עובדים</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
    <h2>דו״ח עובדים</h2>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>תעודת זהות</th><th>שם</th><th>תפקיד</th><th>שם הסמכה</th><th>תקופת זכאות</th><th>ציון</th><th>תאריך התחלה</th><th>תאריך סיום</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["employeeID"]. "</td><td>" . $row["name"]. "</td><td>" . $row["position"]. "</td><td>" . $row["certName"]. "</td><td>" . $row["certPeriod"]. "</td><td>" . $row["certGrade"]. "</td><td>" . $row["certStartDate"]. "</td><td>" . $row["certEndDate"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "אין נתונים להצגה";
}

echo "<button onclick=\"location.href='index.html'\">חזרה</button>
</body>
</html>";

$conn->close();
?>
