<?php

// Image source: full URL (e.g. from the internet) or a file inside public/images.
function img(string $name): string
{
    return str_starts_with($name, 'http') ? $name : asset('images/'.$name);
}

// Build a URL that keeps the current language (ar or en).
function l(string $path = ''): string
{
    return url('/'.app()->getLocale().$path);
}

// Same page in the other language, used by the language switch.
function switch_url(string $locale): string
{
    $rest = implode('/', array_slice(request()->segments(), 1));

    return url('/'.$locale.($rest ? '/'.$rest : ''));
}
