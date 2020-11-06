<?php

use App\Models\Building;
use App\Models\Category;
use App\Models\Firm;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Building::class, 50)->create();
        factory(App\Models\Phone::class, 100)->create();
        $categories = Category::all();

        Firm::all()->each(function ($firm) use($categories){
            $firm->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

    }
}
