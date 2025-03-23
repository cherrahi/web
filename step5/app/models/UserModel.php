<?php
class UserModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // ✅ 1. تسجيل مستخدم جديد مع تشفير كلمة المرور ومنع التكرار
    public function registerUser($username, $password, $role = 'user') {
        // تحقق إذا كان اسم المستخدم موجودًا مسبقًا
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            return false; // المستخدم موجود بالفعل
        }

        // تشفير كلمة المرور
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // إدخال المستخدم الجديد في قاعدة البيانات
        $stmt = $this->db->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $hashedPassword, $role]);
    }

    // ✅ 2. تسجيل الدخول والتحقق من كلمة المرور المشفرة
    public function loginUser($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // تحقق من صحة كلمة المرور باستخدام password_verify()
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>


