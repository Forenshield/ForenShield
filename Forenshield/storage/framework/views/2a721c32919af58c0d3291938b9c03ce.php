<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid py-4">
            <?php echo $__env->make('layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="pir" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="temperature" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="humidity" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="gas" class="w-100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('layouts.footer2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        getData();
        setInterval(function() {
            getData();
        }, 10000);

    });

    let initialized = false;
    let chartObjects = [];

    function getData() {
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('admin.live.data1')); ?>",
            beforeSend: function() {},
            success: function(response) {
                let index = 0;
                response.forEach(element => {
                    if (!initialized) {
                        let chart = new Chart(document.getElementById(element.id).getContext(
                            "2d"), {
                            type: 'line',
                            data: {
                                labels: element.labels,
                                datasets: [{
                                    label: element.title,
                                    data: element.data,
                                    borderColor: ['black'],
                                    borderWidth: 2,
                                    pointRadius: 5,
                                }],
                            },
                            options: {
                                responsive: false,
                                scales: {
                                    x: {
                                        display: false
                                    }
                                }
                            },
                        });
                        chartObjects.push(chart);
                    } else {
                        chartObjects[index].data = {
                            labels: element.labels,
                            datasets: [{
                                label: element.title,
                                data: element.data,
                                borderColor: ['black'],
                                borderWidth: 2,
                                pointRadius: 5,
                            }],
                        };
                        chartObjects[index].update('none');
                    }

                    index++;
                });
                initialized = true;
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gethmi Rathnayaka\Desktop\Forenshield\Forenshield Final Update\Forenshield\resources\views/home.blade.php ENDPATH**/ ?>