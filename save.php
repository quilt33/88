<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "user_paidads";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$full_name = $_POST['full_name'] ?? '';
$city = $_POST['city'] ?? '';
$identity = $_POST['identity'] ?? '';
$phone = $_POST['phone'] ?? '';

if (empty($full_name) || empty($city) || empty($phone)) {
    die("❌ بعض الحقول المطلوبة مفقودة.");
}

$sql = "INSERT INTO users (الاسم_بالكامل, المدينة, حامل_تعريف, رقم_الهاتف) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $city, $identity, $phone);

if ($stmt->execute()) {
    echo "✅ تم حفظ البيانات بنجاح.";
} else {
    echo "❌ خطأ في التنفيذ: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
