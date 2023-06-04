<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share([
            'ads' => [
                [
                    'title' => 'New Xiaomi Redmi Note 12 128 GB Gray',
                    'image_path' => '/assets/img/gallery/ad_1.jpg',
                    'price' => '23000',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'mobile',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Toyota Succeed 2013 White',
                    'image_path' => '/assets/img/gallery/ad_2.jpg',
                    'price' => '820000',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'vehicles',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Brand New Leather Barstools',
                    'image_path' => '/assets/img/gallery/ad_3.jpg',
                    'price' => '7500',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'furniture',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Mesh Office Chair',
                    'image_path' => '/assets/img/gallery/ad_12.jpg',
                    'price' => '8000',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'furniture',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Land Rover Discovery 2009 Black',
                    'image_path' => '/assets/img/gallery/ad_10.jpg',
                    'price' => '2150000',
                    'location' => 'Westlands, Nairobi',
                    'category' => 'vehicles',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Toyota Hilux 2012 Gray',
                    'image_path' => '/assets/img/gallery/ad_9.jpg',
                    'price' => '2650000',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'vehicles',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Extremely Durable Fashion Jeans',
                    'image_path' => '/assets/img/gallery/ad_11.jpg',
                    'price' => '999',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'fashion',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Solar Panels 200w',
                    'image_path' => '/assets/img/gallery/ad_4.jpg',
                    'price' => '17000',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'electronics',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Powerful Sayona Subwoofer System',
                    'image_path' => '/assets/img/gallery/ad_7.jpg',
                    'price' => '15999',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'electronics',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'EPSON L805 Printers',
                    'image_path' => '/assets/img/gallery/ad_6.jpg',
                    'price' => '23999',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'electronics',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Lenovo Thinkpad Laptop X280',
                    'image_path' => '/assets/img/gallery/ad_5.jpg',
                    'price' => '19000',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'electronics',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'Hisense 32 inch Digital Smart TV',
                    'image_path' => '/assets/img/gallery/ad_8.jpg',
                    'price' => '14999',
                    'location' => 'Nairobi, Nairobi Central',
                    'category' => 'electronics',
                    'is_latest' => true,
                    'is_featured' => true,
                ],
            ],
            'user' => [
                'name' => 'Joseph Muiru',
                'phone_number' => '0724591772',
                'email' => 'jmuiru452@gmail.com',
                'location' => 'Nairobi CBD, Nairobi',
                'join date' => '04/22/2023',
                'avatar_path' => '',
                'package' => 'Pro Plan',
                'is_verified' => 'Pro Plan',
            ],
            'categories' => Category::get(),
        ]);
    }
}
