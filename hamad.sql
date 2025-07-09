-- إنشاء قاعدة البيانات
CREATE DATABASE IF NOT EXISTS hamad;
USE hamad;

-- إنشاء جدول المستخدمين
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20) NOT NULL
);
