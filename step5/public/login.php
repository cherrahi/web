<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../app/models/UserModel.php';
require __DIR__ . '/../app/controllers/UserController.php';

$model = new UserModel($db);
$controller = new UserController($model);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($controller->login($_POST['username'], $_POST['password'])) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('❌ اسم المستخدم أو كلمة المرور غير صحيحة!');</script>";
    }
}
require __DIR__ . '/../app/views/login.php';
?>
