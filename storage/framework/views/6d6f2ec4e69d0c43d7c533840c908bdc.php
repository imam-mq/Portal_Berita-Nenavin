<!DOCTYPE html>
<html>

<head>
    <?php echo $__env->yieldPushContent('before-styles'); ?>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="<?php echo e(asset('output.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('main.css')); ?>" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <?php echo $__env->yieldPushContent('after-styles'); ?>
</head>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->yieldPushContent('before-scripts'); ?>


    <?php echo $__env->yieldPushContent('after-scripts'); ?>

</html><?php /**PATH D:\belajarbaru\resources\views/front/master.blade.php ENDPATH**/ ?>