@extends('layouts.app')
@section('title', 'Admin | Asya')
@section('robots', 'noindex,nofollow')
@section('content')
{{-- Simple password login (CSRF token included) --}}
<section class="block pad-top narrow">
  <h2>دخول الإدارة</h2>
  <form method="POST" action="{{ url('/admin/login') }}" class="form">
    @csrf
    <input type="password" name="password" placeholder="كلمة المرور" required>
    @error('password')<p class="err">{{ $message }}</p>@enderror
    <button class="btn">دخول</button>
  </form>
</section>
@endsection
