<?php
  $ar = app()->getLocale() === 'ar';
  $public = in_array(request()->segment(1), ['ar', 'en']); // public (bilingual) page?
  $title = trim($__env->yieldContent('title')) ?: __('t_home');
  $desc = trim($__env->yieldContent('desc')) ?: __('meta_home');
  $ogImage = trim($__env->yieldContent('og_image')) ?: asset('images/og-image.jpg');
?>
<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e($ar ? 'rtl' : 'ltr'); ?>">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo e($title); ?></title>
  
  <meta name="description" content="<?php echo e($desc); ?>">
  <meta name="robots" content="<?php echo $__env->yieldContent('robots', 'index,follow'); ?>">
  <link rel="canonical" href="<?php echo e(url()->current()); ?>">
  <meta name="theme-color" content="#830819">

  
  <?php if($public): ?>
    <link rel="alternate" hreflang="ar" href="<?php echo e(switch_url('ar')); ?>">
    <link rel="alternate" hreflang="en" href="<?php echo e(switch_url('en')); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo e(switch_url('ar')); ?>">
  <?php endif; ?>

  
  <meta property="og:type" content="<?php echo $__env->yieldContent('og_type', 'website'); ?>">
  <meta property="og:site_name" content="<?php echo e(__('site_name')); ?>">
  <meta property="og:title" content="<?php echo e($title); ?>">
  <meta property="og:description" content="<?php echo e($desc); ?>">
  <meta property="og:url" content="<?php echo e(url()->current()); ?>">
  <meta property="og:image" content="<?php echo e($ogImage); ?>">
  <meta property="og:locale" content="<?php echo e($ar ? 'ar_AR' : 'en_US'); ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo e($title); ?>">
  <meta name="twitter:description" content="<?php echo e($desc); ?>">
  <meta name="twitter:image" content="<?php echo e($ogImage); ?>">

  
  <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('images/favicon-32.png')); ?>">
  <link rel="apple-touch-icon" href="<?php echo e(asset('images/apple-touch-icon.png')); ?>">
  <link rel="manifest" href="<?php echo e(asset('site.webmanifest')); ?>">

  
  <link rel="preload" href="<?php echo e(asset('fonts/TheYearofTheCamel-Regular.otf')); ?>" as="font" type="font/otf" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500;700&family=Cairo:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/asya.css')); ?>">

  
  <script type="application/ld+json"><?php echo json_encode([
    '<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>' => 'https://schema.org', '@type' => 'Organization', 'name' => 'Asya', 'alternateName' => 'آسية',
    'url' => url('/'), 'logo' => asset('images/icon-512.png'),
    'description' => __('meta_home'),
    'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'customer service', 'telephone' => '+'.config('asya.whatsapp'), 'availableLanguage' => ['Arabic', 'English']],
  ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG); ?></script>
  <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body>
  
  <header class="nav <?php echo e(request()->routeIs('home') ? '' : 'solid'); ?>" id="nav" <?php if(request()->routeIs('home')): ?> data-hero <?php endif; ?>>
    <a href="<?php echo e($public ? l() : url('/')); ?>" class="brand" aria-label="Asya">
      <img src="<?php echo e(asset('images/logo-beige.png')); ?>" alt="<?php echo e(__('logo_alt')); ?>" width="127" height="85">
    </a>
    <button class="burger" id="burger" aria-label="menu" aria-expanded="false">☰</button>
    <nav id="menu" aria-label="Main">
      <a href="<?php echo e(l()); ?>"><?php echo e(__('home')); ?></a>
      <a href="<?php echo e(l('/about')); ?>"><?php echo e(__('about')); ?></a>
      <a href="<?php echo e(l('/shop')); ?>"><?php echo e(__('shop')); ?></a>
      <a href="<?php echo e(l('/contact')); ?>"><?php echo e(__('contact')); ?></a>
      
      <?php if($public): ?>
        <a class="lang" href="<?php echo e(switch_url($ar ? 'en' : 'ar')); ?>" hreflang="<?php echo e($ar ? 'en' : 'ar'); ?>"><?php echo e(__('lang_other')); ?></a>
      <?php endif; ?>
    </nav>
  </header>

  <main><?php echo $__env->yieldContent('content'); ?></main>

  
  <footer class="footer">
    <img class="foot-logo" src="<?php echo e(asset('images/logo-beige.png')); ?>" alt="<?php echo e(__('logo_alt')); ?>" width="127" height="85" loading="lazy">
    <p><?php echo e(__('tagline')); ?></p>
    <nav class="foot-links" aria-label="Footer">
      <a href="<?php echo e(l('/about')); ?>"><?php echo e(__('about')); ?></a>
      <a href="<?php echo e(l('/shop')); ?>"><?php echo e(__('shop')); ?></a>
      <a href="<?php echo e(l('/contact')); ?>"><?php echo e(__('contact')); ?></a>
    </nav>
    <a class="btn light" href="https://wa.me/<?php echo e(config('asya.whatsapp')); ?>" target="_blank" rel="noopener"><?php echo e(__('whatsapp')); ?></a>
    <p class="copy">© <?php echo e(date('Y')); ?> Asya Store</p>
  </footer>

  
  <a class="wa-float" href="https://wa.me/<?php echo e(config('asya.whatsapp')); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><?php echo e(__('whatsapp')); ?></a>

  <script src="<?php echo e(asset('js/asya.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH C:\Users\SocialMediaPc1\Desktop\project 11\asya-store (1)\asya\resources\views/layouts/app.blade.php ENDPATH**/ ?>