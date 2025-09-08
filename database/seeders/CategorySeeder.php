<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'حقوق', 'type' => '1', 'icon' => 'las la-hand-holding-usd'],
            ['name' => 'پاداش', 'type' => '1', 'icon' => 'las la-money-bill-wave'],
            ['name' => 'فروش کالا', 'type' => '1', 'icon' => 'las la-coins'],
            ['name' => 'دریافت سود', 'type' => '1', 'icon' => 'las la-wallet'],
            ['name' => 'یارانه دولتی', 'type' => '1', 'icon' => 'las la-search-dollar'],
            ['name' => 'هدیه', 'type' => '1', 'icon' => 'las la-donate'],
            ['name' => 'اجاره', 'type' => '1', 'icon' => 'las la-building'],
            ['name' => 'غیره', 'type' => '1', 'icon' => 'lab la-font-awesome-flag'],

            ['name' => ' قهوه', 'type' => '0', 'icon' => 'las la-coffee'],
            ['name' => ' مواد غذایی', 'type' => '0', 'icon' => 'las la-utensils'],
            ['name' => 'قبض آب و برق', 'type' => '0', 'icon' => 'las la-tachometer-alt'],
            ['name' => 'فست فود', 'type' => '0', 'icon' => 'las la-hamburger'],
            ['name' => 'میوه', 'type' => '0', 'icon' => 'las la-apple-alt'],
            ['name' => 'نوشیدنی', 'type' => '0', 'icon' => 'las la-wine-bottle'],
            ['name' => 'سیگار', 'type' => '0', 'icon' => 'las la-smoking'],
            ['name' => 'تنقلات', 'type' => '0', 'icon' => 'las la-cookie-bite'],
            ['name' => 'پوشاک', 'type' => '0', 'icon' => 'las la-tshirt'],
            ['name' => 'اجاره خونه', 'type' => '0', 'icon' => 'las la-house-damage'],
            ['name' => 'تاکسی', 'type' => '0', 'icon' => 'las la-taxi'],
            ['name' => 'بنزین', 'type' => '0', 'icon' => 'las la-oil-can'],
            ['name' => 'رفت و آمد', 'type' => '0', 'icon' => 'las la-map'],
            ['name' => 'خرج وسیله نقلیه', 'type' => '0', 'icon' => 'las la-car-side'],
            ['name' => 'هدیه', 'type' => '0', 'icon' => 'las la-hand-holding-heart'],
            ['name' => 'ورزش', 'type' => '0', 'icon' => 'las la-running'],
            ['name' => 'آموزش', 'type' => '0', 'icon' => 'las la-school'],
            ['name' => 'مراقبت و زیبایی', 'type' => '0', 'icon' => 'las la-spray-can'],
            ['name' => 'اینترنت', 'type' => '0', 'icon' => 'las la-wifi'],
            ['name' => 'وسایل و لوازم', 'type' => '0', 'icon' => 'las la-couch'],
            ['name' => 'بیمه ، اداری و خدمات', 'type' => '0', 'icon' => 'las la-briefcase'],
            ['name' => 'تفریح و سرگرمی', 'type' => '0', 'icon' => 'las la-gamepad'],
            ['name' => 'سفر', 'type' => '0', 'icon' => 'las la-plane-departure'],
            ['name' => 'سایر', 'type' => '0', 'icon' => 'las la-wallet'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
