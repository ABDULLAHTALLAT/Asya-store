<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // Show the login form.
    public function loginForm()
    {
        return view('admin.login');
    }

    // Check the password against the stored hash.
    public function login(Request $request)
    {
        $request->validate(['password' => 'required|string']);

        $hash = config('asya.admin_password_hash');

        if (! $hash || ! Hash::check($request->password, $hash)) {
            return back()->withErrors(['password' => 'كلمة المرور غير صحيحة']);
        }

        $request->session()->regenerate(); // prevents session fixation
        $request->session()->put('asya_admin', true);

        return redirect()->route('admin.dashboard');
    }

    // Log out and destroy the session.
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/ar');
    }

    // Dashboard: counts + product list.
    public function index()
    {
        return view('admin.dashboard', [
            'total' => Product::count(),
            'best' => Product::where('is_best_seller', true)->count(),
            'products' => Product::latest()->get(),
        ]);
    }

    // Add a product with validated input and image upload.
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ar' => 'required|string|max:120',
            'name_en' => 'nullable|string|max:120',
            'price' => 'required|numeric|min:0|max:1000000',
            'description_ar' => 'nullable|string|max:1000',
            'description_en' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2 MB, real images only
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $data['is_best_seller'] = $request->boolean('is_best_seller');
        Product::create($data);

        return back()->with('ok', 'تمت إضافة المنتج');
    }

    // Delete a product.
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('ok', 'تم حذف المنتج');
    }
}
