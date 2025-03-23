<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../app/models/BmiModel.php';
require __DIR__ . '/../app/controllers/BmiController.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$model = new BmiModel($db);
$bmiHistory = $model->getBmiHistory($_SESSION['user_id']);

require __DIR__ . '/../app/views/bmi_chart.php';
?>
