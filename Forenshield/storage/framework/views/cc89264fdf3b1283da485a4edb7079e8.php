<div class="col-md-12">
    <?php if(session()->has('code')): ?>
        <div class="alert alert-sm alert-<?php echo e(session()->get('color')); ?>">
            <small class="text-xs text-white"><?php echo e(session()->get('msg')); ?></small>
        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <?php echo e(implode('', $errors->all('<div>:message</div>'))); ?>

    <?php endif; ?>
</div>
<?php /**PATH C:\Users\Gethmi Rathnayaka\Desktop\Forenshield\Forenshield Final Update\Forenshield\resources\views/layouts/flash.blade.php ENDPATH**/ ?>