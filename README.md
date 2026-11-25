# Asya Store (آسية) - Arabic + English

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate:fresh --seed --seeder=ProductSeeder
php artisan serve
```
Pages: /ar and /en -> home, about, shop, product/{id}, contact. Dashboard: /admin/login.

## Real photos
Every image slot (slides, gallery, banners, products) is set in `config/asya.php`
and the seeder. Each value can be a file in `public/images/` OR a full https URL
from the internet (Unsplash, Pexels, ...). Photos in public/images are crops of your two photos; replace them or upload real product photos from the dashboard.

`.env`: ASYA_WHATSAPP=905XXXXXXXXX and ASYA_ADMIN_HASH='<password_hash output>'.
Checks: `php artisan test`, `vendor/bin/pint`.

## SEO included
Meta title/description per page, canonical + hreflang (ar/en), Open Graph and Twitter cards,
JSON-LD (Organization, Product), /sitemap.xml, /robots.txt, favicon + app icons, and noindex on /admin.
Set `APP_URL` in `.env` to your real domain so canonical links and the sitemap are correct.
