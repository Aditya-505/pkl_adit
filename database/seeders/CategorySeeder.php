<?php
namespace Database\Seeders;

use App\Models\Category;
use DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',

        ]);

        category::create([
            'name' => 'Perabotan rumah',
            'slug' => 'perabotan_rumah',

        ]);
    }
}
