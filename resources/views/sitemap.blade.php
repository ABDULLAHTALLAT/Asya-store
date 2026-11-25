{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
@foreach(['ar', 'en'] as $loc)
  @foreach($pages as $path)
  <url>
    <loc>{{ url('/'.$loc.$path) }}</loc>
    @foreach(['ar', 'en'] as $alt)<xhtml:link rel="alternate" hreflang="{{ $alt }}" href="{{ url('/'.$alt.$path) }}"/>@endforeach
  </url>
  @endforeach
  @foreach($products as $pr)
  <url>
    <loc>{{ url('/'.$loc.'/product/'.$pr->id) }}</loc>
    <lastmod>{{ $pr->updated_at->toAtomString() }}</lastmod>
    @foreach(['ar', 'en'] as $alt)<xhtml:link rel="alternate" hreflang="{{ $alt }}" href="{{ url('/'.$alt.'/product/'.$pr->id) }}"/>@endforeach
  </url>
  @endforeach
@endforeach
</urlset>
