<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Only these columns may be mass-assigned.
    protected $fillable = ['name_ar', 'name_en', 'description_ar', 'description_en', 'price', 'image', 'is_best_seller'];

    // Cast DB values to proper PHP types.
    protected $casts = ['price' => 'decimal:2', 'is_best_seller' => 'boolean'];

    // Name in the current language, falling back to the other one.
    public function title(): string
    {
        $ar = app()->getLocale() === 'ar';

        return ($ar ? $this->name_ar : $this->name_en) ?: ($this->name_ar ?: $this->name_en);
    }

    // Description in the current language.
    public function about(): string
    {
        $ar = app()->getLocale() === 'ar';

        return ($ar ? $this->description_ar : $this->description_en) ?: ($this->description_ar ?: $this->description_en ?? '');
    }

    // WhatsApp order link with a message in the current language.
    public function whatsappUrl(): string
    {
        $text = __('wa_msg').' '.$this->title();

        return 'https://wa.me/'.config('asya.whatsapp').'?text='.rawurlencode($text);
    }

    // Image URL: uploaded file, public/images file, or a full URL.
    public function imageUrl(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return str_starts_with($this->image, 'products/') ? asset('storage/'.$this->image) : img($this->image);
    }
}
