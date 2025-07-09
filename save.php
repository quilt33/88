<?php
$host = "localhost";
$user = "root"; // أو اسم المستخدم الخاص بك
$pass = "";     // كلمة المرور الخاصة بك
$db   = "user_paidads";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$city = $_POST['city'];
$identity = $_POST['identity'];
$phone = $_POST['phone'];

$sql = "INSERT INTO users (full_name, city, identity, phone, created_at)
        VALUES ('$full_name', '$city', '$identity', '$phone', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "تم إدخال البيانات بنجاح.";
} else {
    echo "خطأ: " . $conn->error;
}

$conn->close();
?>
