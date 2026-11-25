{{-- Page header banner with a background image --}}
<section class="banner" style="background-image:url('{{ img(config('asya.banners.'.$key)) }}')">
  <div><h1>{{ $title }}</h1>@isset($sub)<p>{{ $sub }}</p>@endisset</div>
</section>
