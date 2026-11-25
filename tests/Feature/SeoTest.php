<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    // Every public page needs a meta description, canonical link and hreflang.
    public function test_home_has_seo_tags(): void
    {
        $this->get('/ar')->assertOk()
            ->assertSee('<meta name="description"', false)
            ->assertSee('rel="canonical"', false)
            ->assertSee('hreflang="en"', false);
    }

    // Product pages expose structured data with the price.
    public function test_product_has_json_ld(): void
    {
        $p = Product::create(['name_ar' => 'اختبار', 'name_en' => 'Test', 'price' => 100]);
        $this->get('/en/product/'.$p->id)->assertOk()->assertSee('"@type":"Product"', false);
    }

    // robots.txt hides the admin area and the sitemap lists pages.
    public function test_robots_and_sitemap(): void
    {
        $this->get('/robots.txt')->assertSee('Disallow: /admin');
        $this->get('/sitemap.xml')->assertOk()->assertSee('/ar/shop', false);
    }

    // The admin login must not be indexed.
    public function test_admin_is_noindex(): void
    {
        $this->get('/admin/login')->assertSee('noindex', false);
    }
}
