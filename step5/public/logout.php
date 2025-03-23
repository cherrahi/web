<?php
session_start(); // تأكد من بدء الجلسة

// حذف جميع بيانات الجلسة
$_SESSION = array();
session_unset();
session_destroy();

// حذف الكوكيز إن وجدت
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// إعادة التوجيه إلى صفحة تسجيل الدخول
header("Location: login.php");
exit();
?>

