@extends('layouts.app')
@section('title', __('t_home'))
@section('desc', __('meta_home'))
@section('content')
{{-- Hero slider: 4 animated slides with images --}}
<section class="slider" id="slider">
  @foreach(config('asya.slides') as $i => $file)
    <div class="slide {{ $i === 0 ? 'on' : '' }}" role="img" aria-label="{{ __('s'.($i + 1)) }}" style="background-image:url('{{ img($file) }}')">
      <div class="slide-text">
        {{-- Only the first slide is the page's H1 --}}
        @if($i === 0)<h1>{{ __('s1') }}</h1>@else<h2>{{ __('s'.($i + 1)) }}</h2>@endif
        <p>{{ __('s'.($i + 1).'t') }}</p>
        <a class="btn light" href="{{ l('/shop') }}">{{ __('shop_now') }}</a>
      </div>
    </div>
  @endforeach
  <div class="dots" id="dots"></div>
</section>

{{-- About teaser linking to the About page --}}
<section class="block" id="about">
  <h2>{{ __('about') }}</h2>
  <p>{{ __('about_short') }}</p>
  <p><a class="btn" href="{{ l('/about') }}">{{ __('read_more') }}</a></p>
</section>

{{-- Mission and vision side by side --}}
<section class="block split">
  <div class="panel"><h2>{{ __('mission') }}</h2><p>{{ __('mission_t') }}</p></div>
  <div class="panel"><h2>{{ __('vision') }}</h2><p>{{ __('vision_t') }}</p></div>
</section>

{{-- Gallery: two rows, mixed sizes --}}
<section class="gallery">
  @foreach(config('asya.gallery') as $i => $g)
    <div class="g g{{ $i + 1 }}" role="img" aria-label="{{ __('alt_photo') }}" style="background-image:url('{{ img($g) }}')"></div>
  @endforeach
</section>

{{-- Best sellers --}}
<section class="block">
  <h2>{{ __('best') }}</h2>
  <div class="grid">
    @forelse($best as $p) @include('partials_card') @empty <p>{{ __('empty') }}</p> @endforelse
  </div>
  <p class="center"><a class="btn" href="{{ l('/shop') }}">{{ __('view_all') }}</a></p>
</section>
@endsection
