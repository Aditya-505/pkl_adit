<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Category;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();
        DB::table('products')->delete();
        

       $category1 = category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',

        ]);

       $category2 =  category::create([
            'name' => 'Perabotan rumah',
            'slug' => 'perabotan_rumah',

        ]);

        product::create([
            'name'        => 'Samsung S25 5G',
            'slug'        => 'samsung-s25-5g',
            'category_id' => $category1->id,
            'description' => 'Lorem Ipsum',
            'image'       => 'image-png',
            'price'       => 24000000,
            'stok'       => 100,
        ]);

        product::create([
            'name'        => 'Sapu lidi',
            'slug'        => 'sapu-lidi',
            'category_id' => $category2->id,
            'description' => 'Lorem Ipsum',
            'image'       => 'image-png',
            'price'       => 24000000,
            'stok'       => 100,
        ]);

    }
}
