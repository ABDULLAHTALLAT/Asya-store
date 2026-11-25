@php
  $ar = app()->getLocale() === 'ar';
  $public = in_array(request()->segment(1), ['ar', 'en']); // public (bilingual) page?
  $title = trim($__env->yieldContent('title')) ?: __('t_home');
  $desc = trim($__env->yieldContent('desc')) ?: __('meta_home');
  $ogImage = trim($__env->yieldContent('og_image')) ?: asset('images/og-image.jpg');
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $ar ? 'rtl' : 'ltr' }}">
<head>
  {{-- Basic meta + mobile viewport --}}
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>
  {{-- SEO: description, robots, canonical --}}
  <meta name="description" content="{{ $desc }}">
  <meta name="robots" content="@yield('robots', 'index,follow')">
  <link rel="canonical" href="{{ url()->current() }}">
  <meta name="theme-color" content="#830819">

  {{-- Language alternates for search engines --}}
  @if($public)
    <link rel="alternate" hreflang="ar" href="{{ switch_url('ar') }}">
    <link rel="alternate" hreflang="en" href="{{ switch_url('en') }}">
    <link rel="alternate" hreflang="x-default" href="{{ switch_url('ar') }}">
  @endif

  {{-- Open Graph + Twitter cards (link previews) --}}
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:site_name" content="{{ __('site_name') }}">
  <meta property="og:title" content="{{ $title }}">
  <meta property="og:description" content="{{ $desc }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ $ogImage }}">
  <meta property="og:locale" content="{{ $ar ? 'ar_AR' : 'en_US' }}">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $title }}">
  <meta name="twitter:description" content="{{ $desc }}">
  <meta name="twitter:image" content="{{ $ogImage }}">

  {{-- Icons and web manifest --}}
  <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
  <link rel="manifest" href="{{ asset('site.webmanifest') }}">

  {{-- Arabic font (self-hosted) is preloaded; Latin uses a slab serif like the logo --}}
  <link rel="preload" href="{{ asset('fonts/TheYearofTheCamel-Regular.otf') }}" as="font" type="font/otf" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500;700&family=Cairo:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/asya.css') }}">

  {{-- Structured data: brand + website --}}
  <script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org', '@type' => 'Organization', 'name' => 'Asya', 'alternateName' => 'آسية',
    'url' => url('/'), 'logo' => asset('images/icon-512.png'),
    'description' => __('meta_home'),
    'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'customer service', 'telephone' => '+'.config('asya.whatsapp'), 'availableLanguage' => ['Arabic', 'English']],
  ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
  @stack('head')
</head>
<body>
  {{-- Navbar: transparent over the home hero, solid elsewhere --}}
  <header class="nav {{ request()->routeIs('home') ? '' : 'solid' }}" id="nav" @if(request()->routeIs('home')) data-hero @endif>
    <a href="{{ $public ? l() : url('/') }}" class="brand" aria-label="Asya">
      <img src="{{ asset('images/logo-beige.png') }}" alt="{{ __('logo_alt') }}" width="127" height="85">
    </a>
    <button class="burger" id="burger" aria-label="menu" aria-expanded="false">☰</button>
    <nav id="menu" aria-label="Main">
      <a href="{{ l() }}">{{ __('home') }}</a>
      <a href="{{ l('/about') }}">{{ __('about') }}</a>
      <a href="{{ l('/shop') }}">{{ __('shop') }}</a>
      <a href="{{ l('/contact') }}">{{ __('contact') }}</a>
      {{-- Language switch (public pages only) --}}
      @if($public)
        <a class="lang" href="{{ switch_url($ar ? 'en' : 'ar') }}" hreflang="{{ $ar ? 'en' : 'ar' }}">{{ __('lang_other') }}</a>
      @endif
    </nav>
  </header>

  <main>@yield('content')</main>

  {{-- Footer --}}
  <footer class="footer">
    <img class="foot-logo" src="{{ asset('images/logo-beige.png') }}" alt="{{ __('logo_alt') }}" width="127" height="85" loading="lazy">
    <p>{{ __('tagline') }}</p>
    <nav class="foot-links" aria-label="Footer">
      <a href="{{ l('/about') }}">{{ __('about') }}</a>
      <a href="{{ l('/shop') }}">{{ __('shop') }}</a>
      <a href="{{ l('/contact') }}">{{ __('contact') }}</a>
    </nav>
    <a class="btn light" href="https://wa.me/{{ config('asya.whatsapp') }}" target="_blank" rel="noopener">{{ __('whatsapp') }}</a>
    <p class="copy">© {{ date('Y') }} Asya Store</p>
  </footer>

  {{-- Floating WhatsApp button --}}
  <a class="wa-float" href="https://wa.me/{{ config('asya.whatsapp') }}" target="_blank" rel="noopener" aria-label="WhatsApp">{{ __('whatsapp') }}</a>

  <script src="{{ asset('js/asya.js') }}" defer></script>
</body>
</html>
