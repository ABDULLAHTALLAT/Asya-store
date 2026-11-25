@extends('layouts.app')
@section('title', $product->title().' | Asya')
@section('desc', \Illuminate\Support\Str::limit($product->about() ?: $product->title(), 155))
@section('og_type', 'product')
@if($product->imageUrl())@section('og_image', $product->imageUrl())@endif
{{-- Structured data so Google can show price and image --}}
@push('head')
<script type="application/ld+json">{!! json_encode([
  '@context' => 'https://schema.org', '@type' => 'Product', 'name' => $product->title(),
  'description' => $product->about(), 'image' => $product->imageUrl(), 'brand' => ['@type' => 'Brand', 'name' => 'Asya'],
  'offers' => ['@type' => 'Offer', 'priceCurrency' => 'EGP', 'price' => (string) $product->price, 'availability' => 'https://schema.org/InStock', 'url' => url()->current()],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
@endpush
@section('content')
{{-- Product page; Blade escapes all output (XSS safe) --}}
<section class="block pad-top split">
  <div class="thumb big">@if($product->imageUrl())<img src="{{ $product->imageUrl() }}" alt="{{ $product->title() }}" width="600" height="800" fetchpriority="high">@endif</div>
  <div>
    <h1 class="ptitle">{{ $product->title() }}</h1>
    <p class="price big-price">{{ number_format($product->price) }} {{ __('currency') }}</p>
    <p>{{ $product->about() }}</p>
    <p><a class="btn" href="{{ $product->whatsappUrl() }}" target="_blank" rel="noopener">{{ __('order') }}</a>
       <a class="btn ghost" href="{{ l('/shop') }}">{{ __('back') }}</a></p>
  </div>
</section>

{{-- Related products --}}
@if($related->count())
<section class="block">
  <h2>{{ __('shop') }}</h2>
  <div class="grid">@foreach($related as $p) @include('partials_card') @endforeach</div>
</section>
@endif
@endsection
