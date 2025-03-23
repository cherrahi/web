<?php
class BmiController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function calculateBmi($user_id, $name, $weight, $height) {
        if ($height == 0) {
            return "الطول لا يمكن أن يكون صفرًا!";
        }

        $bmi = $weight / ($height * $height);
        $status = $this->getBmiStatus($bmi);

        $this->model->saveBmiRecord($user_id, $name, $weight, $height, $bmi, $status);
        return ["bmi" => round($bmi, 2), "status" => $status];
    }

    private function getBmiStatus($bmi) {
        if ($bmi < 18.5) return "نقص الوزن";
        if ($bmi < 24.9) return "وزن طبيعي";
        if ($bmi < 29.9) return "زيادة في الوزن";
        return "سمنة";
    }
}
?>
