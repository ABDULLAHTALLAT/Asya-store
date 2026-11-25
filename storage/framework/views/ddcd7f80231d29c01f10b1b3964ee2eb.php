<?php $__env->startSection('title', __('contact').' | Asya'); ?>
<?php $__env->startSection('desc', __('meta_contact')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials_banner', ['key' => 'contact', 'title' => __('contact'), 'sub' => __('reply')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="block narrow-text center">
  <p class="lead"><?php echo e(__('contact_t')); ?></p>
  <p><a class="btn big" href="https://wa.me/<?php echo e(config('asya.whatsapp')); ?>" target="_blank" rel="noopener"><?php echo e(__('chat')); ?></a></p>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SocialMediaPc1\Desktop\project 11\asya-store (1)\asya\resources\views/contact.blade.php ENDPATH**/ ?>