<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // توجيه المستخدم إلى صفحة تسجيل الدخول إذا لم يكن مسجلاً
    exit();
}

require __DIR__ . '/../config/database.php';
require __DIR__ . '/../app/models/BmiModel.php';
require __DIR__ . '/../app/controllers/BmiController.php';

$model = new BmiModel($db);
$controller = new BmiController($model);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bmi_result = $controller->calculateBmi($_SESSION['user_id'], $_POST['name'], $_POST['weight'], $_POST['height']);
    require __DIR__ . '/../app/views/bmi_result.php';
} else {
    require __DIR__ . '/../app/views/bmi_form.php';
}
?>
