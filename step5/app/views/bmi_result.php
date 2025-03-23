<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتيجة BMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="text-center">نتيجة حساب BMI</h2>
    <div class="alert alert-info">
        <p><strong>BMI:</strong> <?php echo $bmi_result["bmi"]; ?></p>
        <p><strong>الحالة:</strong> <?php echo $bmi_result["status"]; ?></p>
    </div>
    <a href="index.php" class="btn btn-secondary w-100">إجراء حساب آخر</a>
</body>
</html>
