<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/logo.png')); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/nucleo-icons.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/nucleo-svg.css')); ?>" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?php echo e(asset('assets/css/nucleo-svg.css')); ?>" rel="stylesheet" />
    <link id="pagestyle" href="<?php echo e(asset('assets/css/soft-ui-dashboard.css?v=1.0.7')); ?>" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/notiflix/notiflix-3.2.2.min.css')); ?>">
    <script src="<?php echo e(asset('assets/notiflix/notiflix-3.2.2.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.2.1/gauge.min.js"
        integrity="sha512-CvDF0JVxliK2VV8gGA7qEEyRPcORRA2miPvpDhXvlfw0TpbGAmoQHMmEP2eziwKLsNz8PaoNfs4yjnlcpn4E3w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@loadingio/loading-bar@0.1.1/dist/loading-bar.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@loadingio/loading-bar@0.1.1/dist/loading-bar.min.css">
    <!-- jsPDF and jsPDF-AutoTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>


    <style>
        .page-item span {
            color: white !important;
        }

        .guage-label {
            display: block;
            margin-left: 145px;
            margin-top: -80px;
        }

        .height-100 {
            height: 100%;
            background: yellow;
        }

        .clock {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            color: #FFFFFFFF;
            font-size: 60px;
            font-family: Orbitron;
            letter-spacing: 7px;
        }

        td{
            font-size: 12px;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php echo $__env->yieldContent('content'); ?>
    <script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/smooth-scrollbar.min.js')); ?>"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="<?php echo e(asset('assets/js/soft-ui-dashboard.min.js?v=1.0.7')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="<?php echo e(asset('assets/js/utils.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\Gethmi Rathnayaka\Desktop\Forenshield\Forenshield Final Update\Forenshield\resources\views/layouts/app.blade.php ENDPATH**/ ?>