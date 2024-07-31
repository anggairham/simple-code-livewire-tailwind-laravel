## Simple Code Laravel with Livewire and Tailwind

<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a>
    <a href="https://tailwindcss.com" target="_blank"><img src="https://tailwindcss.com/_next/static/media/tailwindcss-logotype-white.944c5d0ef628083bb316f9b3d643385c86bcdb3d.svg" style="bg-red-100" width="200" alt="TailwindCss Logo"></a>
    <a href="https://tailwindcss.com" target="_blank"><img src="https://logowik.com/content/uploads/images/laravel-livewire4180.logowik.com.webp" style="bg-red-100" width="200"  aria-label="Laravel Livewire Logo" alt="Laravel Livewire Logo" decoding="async" width="726" height="545"></a>
</p>

* [DEMO](https://lara-simple-livewire.artefakcoding.my.id/login).
* [API Documentation](https://lara-simple-livewire.artefakcoding.my.id/api/docs).
* [Source Code](https://github.com/bagubr/simple-code-livewire-tailwind-laravel.git).
* [Documentation](https://github.com/bagubr/simple-code-livewire-tailwind-laravel.git/blob/main/README.md).
* [License](https://github.com/bagubr/simple-code-livewire-tailwind-laravel.git/blob/main/LICENSE).

### Development
```bash
git clone
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

### Production
```bash
git clone
composer install --optimize-autoloader --no-dev
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan config:cache
php artisan route:cache
php artisan view:cache

sudo chown -R www-data:www-data /var/www/html/lara-pmb/storage
sudo chown -R www-data:www-data /var/www/html/lara-pmb/bootstrap/cache
sudo chmod -R 775 /var/www/html/lara-pmb/storage
sudo chmod -R 775 /var/www/html/lara-pmb/bootstrap/cache

# ubah direktori database ke www-data agar bisa di write
chown www-data:www-data /var/www/html/lara-pmb/database
sudo chown www-data:www-data /var/www/html/lara-pmb/database/database.sqlite
sudo chmod 664 /var/www/html/lara-pmb/database/database.sqlite


sudo nano /etc/nginx/sites-available/lara_pmb
sudo ln -s /etc/nginx/sites-available/lara_pmb /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx

```
