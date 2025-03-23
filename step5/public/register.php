<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../app/models/UserModel.php';
require __DIR__ . '/../app/controllers/UserController.php';

$model = new UserModel($db);
$controller = new UserController($model);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $controller->register($_POST['username'], $_POST['password'], $_POST['role']);
    echo "<script>alert('$message'); window.location.href = 'register.php';</script>";
} else {
    require __DIR__ . '/../app/views/register.php';
}
?>

