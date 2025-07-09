<?php
// بيانات الاتصال بقاعدة البيانات
$host = "localhost";
$username = "root";     // غيّرها إن كنت تستخدم اسم مستخدم مختلف
$password = "";         // غيّرها إن كانت هناك كلمة مرور
$database = "user_paidads";

// الاتصال بقاعدة البيانات
$conn = new mysqli($host, $username, $password, $database);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استقبال البيانات من POST
$full_name = isset($_POST['full_name']) ? $conn->real_escape_string($_POST['full_name']) : '';
$city = isset($_POST['city']) ? $conn->real_escape_string($_POST['city']) : '';
$identity = isset($_POST['identity']) ? $conn->real_escape_string($_POST['identity']) : '';
$phone = isset($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : '';

// التحقق من أن الحقول الأساسية موجودة
if ($full_name && $city && $phone) {
    $sql = "INSERT INTO users (full_name, city, identity, phone)
            VALUES ('$full_name', '$city', '$identity', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ تم حفظ البيانات بنجاح.";
    } else {
        echo "❌ خطأ في حفظ البيانات: " . $conn->error;
    }
} else {
    echo "❌ يرجى ملء جميع الحقول المطلوبة.";
}

$conn->close();
?>
