<?php

use Phinx\Seed\AbstractSeed;

class ProductsTabelSeeder extends AbstractSeed
{
    
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $i = 0;
        for ($i; $i <= 100; $i++) {
            $name = $faker->name;
            \App\Models\Product::create([
                'name'        => $faker->words(rand(1, 4), true),
                'slug'        => str_slug($name),
                'description' => $faker->paragraph,
                'price'       => $faker->randomFloat(2, 10.00, 100.00),
                'image'       => $faker->imageUrl(600, 400, 'technics'),
                'stock'       => rand(5, 15),
            ]);
            
        }
        
    }
}
