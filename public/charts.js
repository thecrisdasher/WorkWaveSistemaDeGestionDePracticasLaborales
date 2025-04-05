// filepath: c:\Users\casol\Documents\NO BORRAR SOLO ABEL\WorkWaveSistemaDeGestionDePracticasLaborales\public\js\charts.js

document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('applicationsChart').getContext('2d');
    const applicationsChart = new Chart(ctx, {
        type: 'bar', // Change this to 'line', 'pie', etc. as needed
        data: {
            labels: [], // Populate with application dates or categories
            datasets: [{
                label: 'Applications',
                data: [], // Populate with application counts or relevant data
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
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

    // Fetch data for the chart
    fetch('/api/user/applications/statistics') // Adjust the API endpoint as necessary
        .then(response => response.json())
        .then(data => {
            applicationsChart.data.labels = data.labels; // Assuming the API returns labels
            applicationsChart.data.datasets[0].data = data.values; // Assuming the API returns values
            applicationsChart.update();
        })
        .catch(error => console.error('Error fetching application statistics:', error));
});