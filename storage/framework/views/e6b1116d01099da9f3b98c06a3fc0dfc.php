<?php $__env->startSection('title', __('t_home')); ?>
<?php $__env->startSection('desc', __('meta_home')); ?>
<?php $__env->startSection('content'); ?>

<section class="slider" id="slider">
  <?php $__currentLoopData = config('asya.slides'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="slide <?php echo e($i === 0 ? 'on' : ''); ?>" role="img" aria-label="<?php echo e(__('s'.($i + 1))); ?>" style="background-image:url('<?php echo e(img($file)); ?>')">
      <div class="slide-text">
        
        <?php if($i === 0): ?><h1><?php echo e(__('s1')); ?></h1><?php else: ?><h2><?php echo e(__('s'.($i + 1))); ?></h2><?php endif; ?>
        <p><?php echo e(__('s'.($i + 1).'t')); ?></p>
        <a class="btn light" href="<?php echo e(l('/shop')); ?>"><?php echo e(__('shop_now')); ?></a>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <div class="dots" id="dots"></div>
</section>


<section class="block" id="about">
  <h2><?php echo e(__('about')); ?></h2>
  <p><?php echo e(__('about_short')); ?></p>
  <p><a class="btn" href="<?php echo e(l('/about')); ?>"><?php echo e(__('read_more')); ?></a></p>
</section>


<section class="block split">
  <div class="panel"><h2><?php echo e(__('mission')); ?></h2><p><?php echo e(__('mission_t')); ?></p></div>
  <div class="panel"><h2><?php echo e(__('vision')); ?></h2><p><?php echo e(__('vision_t')); ?></p></div>
</section>


<section class="gallery">
  <?php $__currentLoopData = config('asya.gallery'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="g g<?php echo e($i + 1); ?>" role="img" aria-label="<?php echo e(__('alt_photo')); ?>" style="background-image:url('<?php echo e(img($g)); ?>')"></div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>


<section class="block">
  <h2><?php echo e(__('best')); ?></h2>
  <div class="grid">
    <?php $__empty_1 = true; $__currentLoopData = $best; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> <?php echo $__env->make('partials_card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <p><?php echo e(__('empty')); ?></p> <?php endif; ?>
  </div>
  <p class="center"><a class="btn" href="<?php echo e(l('/shop')); ?>"><?php echo e(__('view_all')); ?></a></p>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SocialMediaPc1\Desktop\project 11\asya-store (1)\asya\resources\views/home.blade.php ENDPATH**/ ?>