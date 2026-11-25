@extends('layouts.app')
@section('title', 'Dashboard | Asya')
@section('robots', 'noindex,nofollow')
@section('content')
<section class="block pad-top">
  <h2>لوحة التحكم</h2>
  @if(session('ok'))<p class="ok">{{ session('ok') }}</p>@endif

  {{-- Quick stats --}}
  <div class="stats"><div><b>{{ $total }}</b> منتج</div><div><b>{{ $best }}</b> الأكثر مبيعاً</div></div>

  {{-- Add product form --}}
  <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data" class="form">
    @csrf
    <input name="name_ar" placeholder="اسم المنتج بالعربي" required>
    <input name="name_en" placeholder="Product name (English)">
    <input name="price" type="number" step="0.01" placeholder="السعر" required>
    <textarea name="description_ar" placeholder="الوصف بالعربي"></textarea>
    <textarea name="description_en" placeholder="Description (English)"></textarea>
    <input type="file" name="image" accept="image/*">
    <label><input type="checkbox" name="is_best_seller" value="1"> الأكثر مبيعاً</label>
    @if($errors->any())<p class="err">{{ $errors->first() }}</p>@endif
    <button class="btn">إضافة</button>
  </form>

  {{-- Product table with delete --}}
  <table>
    @foreach($products as $p)
      <tr><td>{{ $p->name_ar }} / {{ $p->name_en }}</td><td>{{ number_format($p->price) }}</td>
        <td><form method="POST" action="{{ route('admin.destroy', $p) }}">@csrf @method('DELETE')<button class="link">حذف</button></form></td></tr>
    @endforeach
  </table>

  <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="link">تسجيل الخروج</button></form>
</section>
@endsection
