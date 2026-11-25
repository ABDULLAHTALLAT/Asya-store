@extends('layouts.app')
@section('title', __('contact').' | Asya')
@section('desc', __('meta_contact'))
@section('content')
@include('partials_banner', ['key' => 'contact', 'title' => __('contact'), 'sub' => __('reply')])
{{-- Single WhatsApp call to action --}}
<section class="block narrow-text center">
  <p class="lead">{{ __('contact_t') }}</p>
  <p><a class="btn big" href="https://wa.me/{{ config('asya.whatsapp') }}" target="_blank" rel="noopener">{{ __('chat') }}</a></p>
</section>
@endsection
