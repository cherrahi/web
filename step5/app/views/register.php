<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل مستخدم جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="text-center">تسجيل مستخدم جديد</h2>
    <form action="../public/register.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">اسم المستخدم</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">كلمة المرور</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">نوع الحساب</label>
            <select name="role" class="form-control">
                <option value="user">مستخدم عادي</option>
                <option value="admin">مسؤول</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">تسجيل</button>
    </form>
</body>
</html>

