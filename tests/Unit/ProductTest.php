<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    // WhatsApp link must contain the configured number and the product name.
    public function test_whatsapp_url_contains_number_and_name(): void
    {
        config(['asya.whatsapp' => '905001112233']);
        $url = (new Product(['name_ar' => 'إسدال']))->whatsappUrl();

        $this->assertStringContainsString('905001112233', $url);
        $this->assertStringContainsString(rawurlencode('إسدال'), $url);
    }
}
