<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Zuragan Admin - <?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->make('layouts.piece.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body>
<div id="wrapper">
    <?php echo $__env->make('layouts.piece.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--/. NAV TOP  -->
    <?php echo $__env->make('layouts.piece.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- /. NAV SIDE  -->

    <div id="page-wrapper">
        <div class="header">
            <h3 class="page-header">
                <?php echo $__env->yieldContent('page_title'); ?>
            </h3>
            <ol class="breadcrumb">
                <li><a href="/admin/dashboard">Home</a></li>
                <?php echo $__env->yieldContent('page_breadcrumb'); ?>
            </ol>

        </div>
        <div id="page-inner">
            <?php if(session('errors')): ?>
            <?php $__currentLoopData = session('errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger"><?php echo e($v); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<?php echo $__env->make('layouts.piece.js', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>
