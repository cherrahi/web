<?php
session_start();

class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // ✅ 1. تسجيل مستخدم جديد
    public function register($username, $password) {
        if (empty($username) || empty($password)) {
            return "⚠️ جميع الحقول مطلوبة!";
        }

        if ($this->model->registerUser($username, $password)) {
            return "✅ تم التسجيل بنجاح!";
        } else {
            return "❌ اسم المستخدم موجود مسبقًا.";
        }
    }

    // ✅ 2. تسجيل الدخول
    public function login($username, $password) {
        $user = $this->model->loginUser($username, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        }
        return false;
    }

    // ✅ 3. تسجيل الخروج
    public function logout() {
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>

