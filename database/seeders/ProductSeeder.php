<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    // Sample products with images so the shop is not empty on first run.
    public function run(): void
    {
        $items = [
            ['إسدال توليب كريمي بدانتيل', 'Cream Tulip Isdal with Lace'], ['إسدال ورد وردي', 'Pink Bloom Isdal'],
            ['إسدال أوراق زرقاء', 'Blue Leaves Isdal'], ['إسدال زهور صغيرة بدانتيل', 'Mini Floral Isdal with Lace'],
            ['طقم إسدال لافندر', 'Lavender Isdal Set'], ['إسدال قلوب قطن', 'Cotton Hearts Isdal'],
            ['إسدال كاميل مطبوع', 'Camel Branch-Print Isdal'], ['طقم صلاة أصفر مع سجادة', 'Yellow Prayer Set with Mat'],
            ['إسدال بني مطرز', 'Brown Embroidered Isdal'], ['إسدال سماوي', 'Sky Blue Isdal'],
            ['إسدال أزهار ربيعية', 'Spring Floral Isdal'], ['إسدال كريمي ورد صغير', 'Cream Rosebud Isdal'],
        ];

        foreach ($items as $i => [$ar, $en]) {
            Product::create([
                'name_ar' => $ar, 'name_en' => $en, 'price' => 650 + ($i % 6) * 50,
                'image' => 'p'.($i + 1).'.jpg', // replace with a real photo later
                'description_ar' => 'إسدال تركي بتصميم أنيق وخامة مريحة تدوم طويلاً.',
                'description_en' => 'A Turkish isdal with an elegant cut and a comfortable, long-lasting fabric.',
                'is_best_seller' => in_array($i, [0, 1, 2, 5, 6, 7]), // shown on the home page
            ]);
        }
    }
}
