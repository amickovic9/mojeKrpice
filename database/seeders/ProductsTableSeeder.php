<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $products = [
  [
                'user_id' => 1,
                'name' => 'Letnja Haljina',
                'description' => 'Lagana, lepršava haljina savršena za leto.',
                'size' => 'M',
                'price' => 3500,
                'image' => 'haljina.jpg'
            ],
            [
                'user_id' => 1,
                'name' => 'Zimska Jakna',
                'description' => 'Topla i udobna jakna za zimu.',
                'size' => 'L',
                'price' => 9000,
                'image' => 'https://images.pexels.com/photos/372042/pexels-photo-372042.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Casual Majica',
                'description' => 'Udobna pamučna majica za svaki dan.',
                'size' => 'S',
                'price' => 1800,
                'image' => 'https://images.pexels.com/photos/377669/pexels-photo-377669.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Farmerke',
                'description' => 'Klasične plave teksas farmerke.',
                'size' => 'M',
                'price' => 5000,
                'image' => 'https://images.pexels.com/photos/298863/pexels-photo-298863.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Sportske Patike',
                'description' => 'Izdržljive i udobne sportske patike.',
                'size' => '42',
                'price' => 8000,
                'image' => 'https://images.pexels.com/photos/2529148/pexels-photo-2529148.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Elegantna Bluza',
                'description' => 'Stilskom bluza za formalne prilike.',
                'size' => 'M',
                'price' => 4500,
                'image' => 'https://images.pexels.com/photos/4065895/pexels-photo-4065895.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Kožna Jakna',
                'description' => 'Moderna kožna jakna za smeliji izgled.',
                'size' => 'XL',
                'price' => 12000,
                'image' => 'https://images.pexels.com/photos/998995/pexels-photo-998995.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Joga Pantalone',
                'description' => 'Fleksibilne i udobne joga pantalone.',
                'size' => 'S',
                'price' => 3500,
                'image' => 'https://images.pexels.com/photos/3757371/pexels-photo-3757371.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Kupaći Kostim',
                'description' => 'Moderni kupaći kostim za plažu.',
                'size' => 'M',
                'price' => 3000,
                'image' => 'https://images.pexels.com/photos/2859389/pexels-photo-2859389.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Poslovno Odelo',
                'description' => 'Profesionalno odelo za poslovne sastanke.',
                'size' => 'L',
                'price' => 24000,
                'image' => 'https://images.pexels.com/photos/428339/pexels-photo-428339.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Duks',
                'description' => 'Udoban i topao duks.',
                'size' => 'L',
                'price' => 4500,
                'image' => 'https://images.pexels.com/photos/797797/pexels-photo-797797.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Džemper',
                'description' => 'Udoban vuneni džemper.',
                'size' => 'M',
                'price' => 5200,
                'image' => 'https://images.pexels.com/photos/1038042/pexels-photo-1038042.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Šorcevi za Trčanje',
                'description' => 'Laki šorcevi za trčanje.',
                'size' => 'M',
                'price' => 3000,
                'image' => 'https://images.pexels.com/photos/1153976/pexels-photo-1153976.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Naočare za Sunce',
                'description' => 'Stiljske naočare za sunčane dane.',
                'size' => 'Jedna veličina',
                'price' => 2500,
                'image' => 'https://images.pexels.com/photos/46710/pexels-photo-46710.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Šešir',
                'description' => 'Kul šešir za leto.',
                'size' => 'Jedna veličina',
                'price' => 1800,
                'image' => 'https://images.pexels.com/photos/1704126/pexels-photo-1704126.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Ranac',
                'description' => 'Izdržljiv ranac za svakodnevnu upotrebu.',
                'size' => 'Jedna veličina',
                'price' => 6000,
                'image' => 'https://images.pexels.com/photos/1157438/pexels-photo-1157438.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Šal',
                'description' => 'Topao zimski šal.',
                'size' => 'Jedna veličina',
                'price' => 3000,
                'image' => 'https://images.pexels.com/photos/835393/pexels-photo-835393.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Sat',
                'description' => 'Elegantni ručni sat.',
                'size' => 'Jedna veličina',
                'price' => 18000,
                'image' => 'https://images.pexels.com/photos/125779/pexels-photo-125779.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Kaiš',
                'description' => 'Klasični kožni kaiš.',
                'size' => 'L',
                'price' => 4200,
                'image' => 'https://images.pexels.com/photos/128513/pexels-photo-128513.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Rukavice',
                'description' => 'Tople zimske rukavice.',
                'size' => 'M',
                'price' => 2500,
                'image' => 'https://images.pexels.com/photos/2959334/pexels-photo-2959334.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Sandale',
                'description' => 'Udobne letnje sandale.',
                'size' => '41',
                'price' => 3600,
                'image' => 'https://images.pexels.com/photos/46710/pexels-photo-46710.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Patike',
                'description' => 'Casual patike za svaki dan.',
                'size' => '42',
                'price' => 7200,
                'image' => 'https://images.pexels.com/photos/2529148/pexels-photo-2529148.jpeg'
            ],
            [
                'user_id' => 1,
                'name' => 'Cipele',
                'description' => 'Formalne cipele za posebne prilike.',
                'size' => '43',
                'price' => 9000,
                'image' => 'https://images.pexels.com/photos/298863/pexels-photo-298863.jpeg'
            ]];
        DB::table('products')->insert($products);
    }
}
