<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    // Guests must not reach the dashboard.
    public function test_guest_is_redirected_from_dashboard(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    // A wrong password must be rejected.
    public function test_wrong_password_is_rejected(): void
    {
        config(['asya.admin_password_hash' => Hash::make('secret')]);
        $this->post('/admin/login', ['password' => 'nope'])->assertSessionHasErrors('password');
    }

    // A correct password opens the dashboard.
    public function test_correct_password_logs_in(): void
    {
        config(['asya.admin_password_hash' => Hash::make('secret')]);
        $this->post('/admin/login', ['password' => 'secret'])->assertRedirect('/admin');
    }

    // Product names with script tags must be escaped on output.
    public function test_output_is_escaped(): void
    {
        Product::create(['name_ar' => '<script>alert(1)</script>', 'price' => 1, 'is_best_seller' => true]);
        $this->get('/ar')->assertDontSee('<script>alert(1)</script>', false);
    }

    // Security headers must be present.
    public function test_security_headers_exist(): void
    {
        $this->get('/ar')->assertHeader('X-Frame-Options', 'DENY');
    }

    // Root redirects to Arabic and English pages load in LTR.
    public function test_languages_work(): void
    {
        $this->get('/')->assertRedirect('/ar');
        $this->get('/en')->assertOk()->assertSee('dir="ltr"', false);
        $this->get('/ar/about')->assertOk();
    }
}
