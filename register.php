<?php
// إعداد الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root"; // اسم المستخدم الافتراضي في XAMPP
$password = "";
$dbname = "hamad";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// التحقق من أن النموذج تم إرساله
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من النموذج
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // تخزين البيانات في قاعدة البيانات
    $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>✅ تم التسجيل بنجاح!</p>";
    } else {
        echo "<p style='color: red;'>❌ خطأ: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل المستخدم</title>
</head>
<body style="direction: rtl; font-family: Arial; padding: 20px;">
    <h2>📝 نموذج التسجيل</h2>
    <form method="post" action="">
        <label>الاسم:</label><br>
        <input type="text" name="name" required><br><br>

        <label>البريد الإلكتروني:</label><br>
        <input type="email" name="email" required><br><br>

        <label>رقم الهاتف:</label><br>
        <input type="text" name="phone" required><br><br>

        <input type="submit" value="تسجيل">
    </form>
</body>
</html>
