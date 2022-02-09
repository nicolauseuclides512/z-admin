<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <!--    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        #login-form {
            background: url(https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            padding: 10px;
        }
    </style>
</head>
<body id="login-form">
<div id="app">
    <div class="text-center" style="color: white">
        <h3>Zuragan Admin</h3>
    </div>
    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
</body>
</html>
