<?php
$servername = "localhost";
$username = "newuser";
$password = "newpassword";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("חיבור נכשל: " . $conn->connect_error);
}

$sql = "SELECT * FROM devices WHERE result='לא תקין'";
$result = $conn->query($sql);

echo "<!DOCTYPE html>
<html dir='rtl'>
<head>
    <meta charset='UTF-8'>
    <title>דו״ח נשקים לא תקינים</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
    <h2>דו״ח נשקים לא תקינים</h2>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>מס״ד</th><th>סוג</th><th>תקופת בדיקה</th><th>תוצאה</th><th>תאריך התחלה</th><th>תאריך סיום</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["serialID"]. "</td><td>" . $row["type"]. "</td><td>" . $row["testPeriod"]. "</td><td>" . $row["result"]. "</td><td>" . $row["startDate"]. "</td><td>" . $row["endDate"]. "</td></tr>";
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
