@extends('layouts.app')
@section('title', __('shop').' | Asya')
@section('desc', __('meta_shop'))
@section('content')
@include('partials_banner', ['key' => 'shop', 'title' => __('shop'), 'sub' => __('shop_sub')])
<section class="block">
  {{-- All products grid --}}
  <div class="grid">
    @foreach($products as $p) @include('partials_card') @endforeach
  </div>
  <div class="pager">{{ $products->links() }}</div>
</section>
@endsection
