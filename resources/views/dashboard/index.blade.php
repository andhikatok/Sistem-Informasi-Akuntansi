@extends('dashboard.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sales Overview</h5>
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Revenue Breakdown</h5>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Top Selling Products</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity Sold</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($topSellingProducts as $product)
                                    <tr>
                                        <td>{{ $product->nama_barang }}</td>
                                        <td>{{ $product->total_quantity }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Satisfaction</h5>
                        <canvas id="satisfactionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Sales Chart
        var salesData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Sales',
                data: [120, 150, 200, 180, 250, 220],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var salesConfig = {
            type: 'line',
            data: salesData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var salesChart = new Chart(document.getElementById('salesChart'), salesConfig);

        // Revenue Chart
        var revenueData = {
            labels: ['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5'],
            datasets: [{
                label: 'Revenue',
                data: [1000, 1500, 800, 1200, 2000],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)', 'rgba(255, 205, 86, 0.2)', 'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)',
                    'rgba(255, 205, 86, 1)', 'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        };

        var revenueConfig = {
            type: 'bar',
            data: revenueData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var revenueChart = new Chart(document.getElementById('revenueChart'), revenueConfig);

        // Satisfaction Chart
        var satisfactionData = {
            labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied'],
            datasets: [{
                label: 'Customer Satisfaction',
                data: [20, 40, 15, 10, 5],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)', 'rgba(255, 205, 86, 0.2)', 'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)',
                    'rgba(255, 205, 86, 1)', 'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        };

        var satisfactionConfig = {
            type: 'doughnut',
            data: satisfactionData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: false,
                    }
                }
            }
        };

        var satisfactionChart = new Chart(document.getElementById('satisfactionChart'), satisfactionConfig);
    </script>
@endsection
