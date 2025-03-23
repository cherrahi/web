<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حساب BMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="text-center">حاسبة مؤشر كتلة الجسم (BMI)</h2>
    <form action="index.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">الوزن (كجم)</label>
            <input type="number" name="weight" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">الطول (متر)</label>
            <input type="number" step="0.01" name="height" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">حساب</button>
    </form>
</body>
</html>
