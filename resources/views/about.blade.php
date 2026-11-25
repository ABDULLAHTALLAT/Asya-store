@extends('layouts.app')
@section('title', __('about').' | Asya')
@section('desc', __('meta_about'))
@section('content')
@include('partials_banner', ['key' => 'about', 'title' => __('about'), 'sub' => __('tagline')])

{{-- Our story --}}
<section class="block narrow-text">
  <h2>{{ __('story') }}</h2>
  <p>{{ __('story_t') }}</p>
</section>

{{-- Mission and vision --}}
<section class="block split">
  <div class="panel"><h2>{{ __('mission') }}</h2><p>{{ __('mission_t') }}</p></div>
  <div class="panel"><h2>{{ __('vision') }}</h2><p>{{ __('vision_t') }}</p></div>
</section>

{{-- Values --}}
<section class="block">
  <h2>{{ __('values') }}</h2>
  <div class="values">
    @foreach([1, 2, 3] as $n)
      <div class="panel"><h3>{{ __('v'.$n) }}</h3><p>{{ __('v'.$n.'t') }}</p></div>
    @endforeach
  </div>
  <p class="center"><a class="btn" href="{{ l('/shop') }}">{{ __('shop_now') }}</a></p>
</section>
@endsection
