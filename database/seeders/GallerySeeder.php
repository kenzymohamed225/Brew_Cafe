<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the gallery database seeds.
     * Run independently: php artisan db:seed --class=GallerySeeder
     */
    public function run(): void
    {
        $items = [
            [
                'title'       => 'Morning Espresso',
                'description' => 'A perfect shot of rich, velvety espresso to start your day.',
                'image'       => 'esspresso.jpg',
                'category'    => 'Coffee',
                'is_active'   => true,
            ],
            [
                'title'       => 'Creamy Cappuccino',
                'description' => 'Silky steamed milk foam layered over robust espresso.',
                'image'       => 'cappuccino.jpg',
                'category'    => 'Coffee',
                'is_active'   => true,
            ],
            [
                'title'       => 'Caramel Macchiato',
                'description' => 'Layered espresso drink with sweet caramel drizzle.',
                'image'       => 'caramel_macchiato.jpg',
                'category'    => 'Coffee',
                'is_active'   => true,
            ],
            [
                'title'       => 'Smooth Latte',
                'description' => 'Balanced espresso with steamed milk — a café classic.',
                'image'       => 'latte.jpg',
                'category'    => 'Coffee',
                'is_active'   => true,
            ],
            [
                'title'       => 'Iced Cold Brew',
                'description' => 'Slow-steeped cold brew served over ice, refreshingly smooth.',
                'image'       => 'coldbrew.jpg',
                'category'    => 'Cold Drinks',
                'is_active'   => true,
            ],
            [
                'title'       => 'Iced Latte',
                'description' => 'Chilled espresso and milk, perfect for warm afternoons.',
                'image'       => 'iced_latte.jpg',
                'category'    => 'Cold Drinks',
                'is_active'   => true,
            ],
            [
                'title'       => 'Cozy Café Atmosphere',
                'description' => 'Our warm, welcoming space designed for your comfort.',
                'image'       => 'coffe.jpg',
                'category'    => 'Ambiance',
                'is_active'   => true,
            ],
            [
                'title'       => 'Decadent Cheesecake',
                'description' => 'Creamy New York style cheesecake, the perfect café treat.',
                'image'       => 'cheesecake.jpg',
                'category'    => 'Food',
                'is_active'   => true,
            ],
            [
                'title'       => 'Americano',
                'description' => 'Espresso diluted with hot water for a smooth, bold cup.',
                'image'       => 'amricano.jpg',
                'category'    => 'Coffee',
                'is_active'   => true,
            ],
            [
                'title'       => 'Rich Mocha',
                'description' => 'Espresso blended with chocolate and steamed milk.',
                'image'       => 'mocha.jpg',
                'category'    => 'Coffee',
                'is_active'   => true,
            ],
        ];

        foreach ($items as $item) {
            // Use existing images from public/assets/images/
            // Only insert if not already present (idempotent)
            Gallery::firstOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
