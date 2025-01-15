<?php
$servername = "localhost";
$username = "mydb";
$password = "1234";
$dbname = "sql_report";

// 創建連接
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}
echo "連接成功";
?>