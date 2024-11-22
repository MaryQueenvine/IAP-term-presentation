<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<h1>Analytics</h1>
<canvas id="analyticsChart" width="400" height="200"></canvas>
<script>
    const ctx = document.getElementById('analyticsChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar', // or 'line', 'pie', etc.
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Analytics Data',
                data: @json($data),
                backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>

