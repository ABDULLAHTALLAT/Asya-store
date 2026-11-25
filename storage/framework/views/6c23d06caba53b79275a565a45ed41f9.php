
<article class="card">
  <a href="<?php echo e(l('/product/'.$p->id)); ?>" class="thumb">
    <?php if($p->imageUrl()): ?><img src="<?php echo e($p->imageUrl()); ?>" alt="<?php echo e($p->title()); ?>" width="600" height="800" loading="lazy"><?php endif; ?>
  </a>
  <h3><a href="<?php echo e(l('/product/'.$p->id)); ?>"><?php echo e($p->title()); ?></a></h3>
  <p class="price"><?php echo e(number_format($p->price)); ?> <?php echo e(__('currency')); ?></p>
  <a class="btn" href="<?php echo e($p->whatsappUrl()); ?>" target="_blank" rel="noopener"><?php echo e(__('order')); ?></a>
</article>
<?php /**PATH C:\Users\SocialMediaPc1\Desktop\project 11\asya-store (1)\asya\resources\views/partials_card.blade.php ENDPATH**/ ?>