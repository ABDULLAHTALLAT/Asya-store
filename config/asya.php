<?php

// Central store settings. Any image value may be a file in public/images OR a full https URL.
return [
    // WhatsApp number in international format, digits only.
    'whatsapp' => env('ASYA_WHATSAPP', '905000000000'),

    // Bcrypt hash of the dashboard password.
    'admin_password_hash' => env('ASYA_ADMIN_HASH'),

    // Hero slides (text lives in lang/*.json under s1..s4 and s1t..s4t).
    'slides' => ['slide1.jpg', 'slide2.jpg', 'slide3.jpg', 'slide4.jpg'],

    // Gallery images (two rows, mixed sizes).
    'gallery' => ['g1.jpg', 'g2.jpg', 'g3.jpg', 'g4.jpg', 'g5.jpg', 'g6.jpg', 'g7.jpg'],

    // Page banners (header images).
    'banners' => ['about' => 'about.jpg', 'shop' => 'shop.jpg', 'contact' => 'contact.jpg'],
];
