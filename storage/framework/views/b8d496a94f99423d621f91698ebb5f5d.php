<?php $__env->startSection('title', __('shop').' | Asya'); ?>
<?php $__env->startSection('desc', __('meta_shop')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials_banner', ['key' => 'shop', 'title' => __('shop'), 'sub' => __('shop_sub')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<section class="block">
  
  <div class="grid">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo $__env->make('partials_card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div class="pager"><?php echo e($products->links()); ?></div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SocialMediaPc1\Desktop\project 11\asya-store (1)\asya\resources\views/shop.blade.php ENDPATH**/ ?>