{{-- Reusable product card with a real <img> (good for SEO); no add-to-cart --}}
<article class="card">
  <a href="{{ l('/product/'.$p->id) }}" class="thumb">
    @if($p->imageUrl())<img src="{{ $p->imageUrl() }}" alt="{{ $p->title() }}" width="600" height="800" loading="lazy">@endif
  </a>
  <h3><a href="{{ l('/product/'.$p->id) }}">{{ $p->title() }}</a></h3>
  <p class="price">{{ number_format($p->price) }} {{ __('currency') }}</p>
  <a class="btn" href="{{ $p->whatsappUrl() }}" target="_blank" rel="noopener">{{ __('order') }}</a>
</article>
