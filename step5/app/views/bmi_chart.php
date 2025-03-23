<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>سجل BMI</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="container mt-5">
    <h2 class="text-center">تاريخ BMI</h2>
    <canvas id="bmiChart"></canvas>
    <script>
        const ctx = document.getElementById('bmiChart').getContext('2d');
        const bmiData = <?php echo json_encode($bmiHistory); ?>;
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: bmiData.map(entry => entry.timestamp),
                datasets: [{
                    label: 'BMI',
                    data: bmiData.map(entry => entry.bmi),
                    borderColor: 'blue',
                    borderWidth: 2
                }]
            }
        });
    </script>
</body>
</html>
