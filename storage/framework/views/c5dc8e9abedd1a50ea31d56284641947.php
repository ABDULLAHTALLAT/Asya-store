<?php $__env->startSection('title', __('about').' | Asya'); ?>
<?php $__env->startSection('desc', __('meta_about')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials_banner', ['key' => 'about', 'title' => __('about'), 'sub' => __('tagline')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<section class="block narrow-text">
  <h2><?php echo e(__('story')); ?></h2>
  <p><?php echo e(__('story_t')); ?></p>
</section>


<section class="block split">
  <div class="panel"><h2><?php echo e(__('mission')); ?></h2><p><?php echo e(__('mission_t')); ?></p></div>
  <div class="panel"><h2><?php echo e(__('vision')); ?></h2><p><?php echo e(__('vision_t')); ?></p></div>
</section>


<section class="block">
  <h2><?php echo e(__('values')); ?></h2>
  <div class="values">
    <?php $__currentLoopData = [1, 2, 3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="panel"><h3><?php echo e(__('v'.$n)); ?></h3><p><?php echo e(__('v'.$n.'t')); ?></p></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <p class="center"><a class="btn" href="<?php echo e(l('/shop')); ?>"><?php echo e(__('shop_now')); ?></a></p>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SocialMediaPc1\Desktop\project 11\asya-store (1)\asya\resources\views/about.blade.php ENDPATH**/ ?>