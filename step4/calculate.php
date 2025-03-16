<?php
header('Content-Type: application/json'); // تأكد من أن الاستجابة بصيغة JSON

// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";   // اسم المستخدم لقاعدة البيانات
$password = "";       // كلمة السر
$dbname = "bmi_calculator";  // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['name'], $_POST['weight'], $_POST['height'])) {
    $name = htmlspecialchars($_POST['name']);
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    // تحقق من المدخلات
    if ($weight <= 0 || $height <= 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid input values. Weight and height must be greater than zero.'
        ]);
        exit;
    }

    // حساب الـ BMI
    $bmi = $weight / pow($height, 2);

    if ($bmi < 18.5) {
        $interpretation = "Underweight";
    } elseif ($bmi < 25) {
        $interpretation = "Normal weight";
    } elseif ($bmi < 30) {
        $interpretation = "Overweight";
    } else {
        $interpretation = "Obesity";
    }

    // حفظ البيانات في قاعدة البيانات
    $stmt = $conn->prepare("INSERT INTO bmi_results (name, weight, height, bmi, interpretation, date) VALUES (?, ?, ?, ?, ?, NOW())");
    
    // تحقق من صحة تحضير الاستعلام
    if ($stmt === false) {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to prepare statement: ' . $conn->error
        ]);
        exit;
    }

    $stmt->bind_param("ssdds", $name, $weight, $height, $bmi, $interpretation);

    // تنفيذ الاستعلام
    if ($stmt->execute()) {
        // إرجاع النتيجة بصيغة JSON
        $message = "Hello, $name. Your BMI is " . number_format($bmi, 2) . " ($interpretation).";
        echo json_encode([
            'success' => true,
            'bmi' => $bmi,
            'message' => $message
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to save data to database: ' . $stmt->error
        ]);
    }

    // غلق الاتصال
    $stmt->close();
    $conn->close();
    exit;
}

echo json_encode([
    'success' => false,
    'message' => 'Data not received.'
]);
exit;
?>
