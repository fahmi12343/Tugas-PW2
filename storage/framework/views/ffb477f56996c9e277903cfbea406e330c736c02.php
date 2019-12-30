<?php $__env->startSection('content'); ?>
<h2 align="center">Welcome</h2> <br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  Chart Donuts
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <canvas id="myChart" width="400" height="400"></canvas>
                        <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'radar',
                            data: {
                                labels: <?php echo json_encode($Categories); ?>,
                                datasets: [{
                                    label: '# of Votes',
                                    data: <?php echo json_encode($Data); ?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(160, 102, 255, 0.2)',
                                        'rgba(56, 192, 192, 0.2)',
                                        'rgba(59, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(160, 102, 255, 0.2)',
                                        'rgba(56, 192, 192, 0.2)',
                                        'rgba(59, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                        </script>
                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                  </blockquote>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  Chart Table
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <canvas id="1" width="400" height="400"></canvas>
                        <script>
                        var ctx = document.getElementById('1').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: <?php echo json_encode($Categories); ?>,
                                datasets: [{
                                    label: '# of Votes',
                                    data:  <?php echo json_encode($Data); ?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(160, 102, 255, 0.2)',
                                        'rgba(56, 192, 192, 0.2)',
                                        'rgba(59, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(160, 102, 255, 0.2)',
                                        'rgba(56, 192, 192, 0.2)',
                                        'rgba(59, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                        </script>
                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                  </blockquote>
                </div>
            </div>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\barang_0369\resources\views/dashboard.blade.php ENDPATH**/ ?>